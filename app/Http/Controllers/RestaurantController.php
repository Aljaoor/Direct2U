<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantsRequest\StoreRestaurantRequest;
use App\Http\Requests\RestaurantsRequest\StoreReviewRequest;
use App\Http\Requests\RestaurantsRequest\UpdateRestaurantRequest;
use App\Mail\Restaurants\acceptRequest;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class RestaurantController extends Controller
{
    use ImageTrait;

    public function getRestaurants()
    {
        $restuarants = Restaurant::where('city',session('region'))->whereStatus(true)->get();
        return view('admin_panel.restaurants.index', compact('restuarants'));
    }

    public function getRequestsToBeRestaurants()
    {
        $restuarants = Restaurant::whereStatus(false)->get();
        return view('admin_panel.restaurants.requests-to-be-restaurants', compact('restuarants'));
    }

    public function getRequestDetails($id)
    {
        $restaurant = Restaurant::find($id);
        return view('admin_panel.restaurants.request-details', compact('restaurant'));
    }

    public function acceptRequest($id)
    {
        $restaurant = Restaurant::find($id)->tap(function ($query) {
            $query->update(['status' => true]);
        })->find($id);
        $user = $restaurant->user;
        Mail::to($user->email)->send(new acceptRequest($user));
        session()->flash('success', "The restaurant has been accepted successfully and an email has been sent to the user");
        return redirect()->route('restaurants.get-requests-to-be-restaurants');
    }

    public function create()
    {
        return view('admin_panel.restaurants.create');
    }

    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();
        if ($request->has('image')) {
            $data['image'] = $this->uploadImage($data['image']);
        }
        $data['password'] = Hash::make($data['password']);

//        store user accont
        $user = User::create([
            'name' => $data['user_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => $data['password'],
        ]);
        $role = Role::findByName('Restaurant')->name;
        $user->assignRole($role);
//        store the restaurant
        $data['user_id'] = $user->id;
        $data = Arr::except($data, ['user_name', 'email', 'mobile', 'password']);
        Restaurant::create($data);

        session()->flash('success', "the restaurant has been stored successfully");
        return redirect()->back();
    }

    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        return view('admin_panel.restaurants.edit', compact('restaurant'));
    }

    public function update(UpdateRestaurantRequest $request)
    {
        $data = $request->validated();
        $restaurant = Restaurant::find($data['id']);
        $user = User::find($restaurant->user_id);
        if (!$data['password'])
            $data['password'] = $restaurant->user->password;
        else {
            $data['password'] = Hash::make($data['password']);
        }
        if ($request->has('image')) {
            $this->deleteImage($data['image']);
            $data['image'] = $this->uploadImage($data['image']);
        }
        $user->update([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        $data = Arr::except($data, ['user_name', 'email', 'mobile', 'password']);
        $restaurant->update($data);

        session()->flash('success', "The Restaurant has been Updated Successfully");
        return redirect()->route('restaurants.get-restaurants');
    }

    public function delete(int $id)
    {
        $restaurant = Restaurant::find($id);
        $this->deleteImage($restaurant->image);
        User::find($restaurant->user_id)->delete();
        $restaurant->delete();
        session()->flash('success', 'The Restaurant has been Deleted Successfully');
        return redirect()->back();
    }

//    website funcation

    public function index()
    {
        $restuarants = Restaurant::whereStatus(true)->get();
        $categories = Category::get();
        $allCat = [];
        $limit = 15;
        foreach ($categories as $category) {
            $translationName = $category->name;
            if (!in_array($translationName, $allCat)) {
                $allCat[] = $translationName;
                if (count($allCat) === $limit) {
                    break;
                }
            }
        }
        return view('website.Restaurants.index', compact('restuarants', 'allCat'));
    }

    public function getRestaurantsDetails(int $id)
    {
        $restuarant = Restaurant::find($id);
        return view('website.Restaurants.details', compact('restuarant'));
    }

    public function registerAsRestaurant(StoreRestaurantRequest $request)
    {
        $data = $request->validated();
        $data['status'] = false;
        if ($request->has('image')) {
            $data['image'] = $this->uploadImage($data['image']);
        }
        $data['password'] = Hash::make($data['password']);

//        store user accont
        $user = User::create([
            'name' => $data['user_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => $data['password'],
        ]);
        $role = Role::findByName('Restaurant')->name;
        $user->assignRole($role);
        Auth::login($user);
//        store the restaurant
        $data['user_id'] = $user->id;
        $data = Arr::except($data, ['user_name', 'email', 'mobile', 'password']);
        Restaurant::create($data);

        Alert::success(__('alert.success'), __('alert.register_as_restaurant'))->autoClose(25000);
        return redirect()->route('home');
    }

    public function storeReview(StoreReviewRequest $request)
    {
        $data = $request->validated();
        Review::create($data);
        Alert::success(__('alert.success'), __('alert.store_review'));
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $restaurants = Restaurant::whereStatus(true)->where('name', 'LIKE', '%' . $query . '%')->get();

        return response()->json($restaurants);
    }

    public function filter(Request $request)
    {
        $categories = $request->categories;
        $rate = $request->rate;
        if (isset($categories[0]) && !$rate) {
            $restuarants = Restaurant::whereHas('categories', function ($query) use ($categories) {
                $query->join('category_translations', 'categories.id', '=', 'category_translations.category_id')
                    ->whereIn('category_translations.name', $categories);
            })->get();
        } elseif (!isset($categories[0]) && $rate) {
            $restuarants = Restaurant::where(function ($query) use ($rate) {
                $query->whereHas('reviews', function ($reviewQuery) use ($rate) {
                    $reviewQuery->havingRaw('AVG(rate) >= ?', [$rate]);
                })
                    ->orWhereDoesntHave('reviews');
            })->get();
        } elseif (isset($categories[0]) && $rate) {
            $restuarants = Restaurant::whereHas('categories', function ($query) use ($categories) {
                $query->join('category_translations', 'categories.id', '=', 'category_translations.category_id')
                    ->whereIn('category_translations.name', $categories);
            })
                ->where(function ($query) use ($rate) {
                    $query->whereHas('reviews', function ($reviewQuery) use ($rate) {
                        $reviewQuery->havingRaw('AVG(rate) >= ?', [$rate]);
                    })
                        ->orWhereDoesntHave('reviews');
                })
                ->get();
        }else{
            $restuarants = Restaurant::get();
        }
        $categories = Category::get();
        $allCat = [];
        $limit = 15;
        foreach ($categories as $category) {
            $translationName = $category->name;
            if (!in_array($translationName, $allCat)) {
                $allCat[] = $translationName;
                if (count($allCat) === $limit) {
                    break;
                }
            }
        }
        return view('website.Restaurants.index', compact('restuarants', 'allCat'));
    }
}
