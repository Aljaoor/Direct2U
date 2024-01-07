<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequests\StoreCategoryRequest;
use App\Http\Requests\MealRequest\StoreMealRequest;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MealController extends Controller
{

    use ImageTrait;
    public function getCategories()
    {
        $user = auth()->user();
        if ($user->hasRole('Restaurant')) {
            $categories = Category::where('restaurant_id', $user->restaurant->id)->get();
        } else {
            $categories = Category::get();
            $restaurants = Restaurant::get();
            return view('admin_panel.categories.index', compact('categories', 'restaurants'));
        }
        return view('admin_panel.categories.index', compact('categories'));

    }

    public function StoreCategory(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        if (!isset($data['restaurant_id']))
            $data['restaurant_id'] = $user->restaurant->id;
        Category::create($data);
        $request->session()->flash('success', 'the category stored successfully');
        return redirect()->back();
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        session()->flash('success', 'the category Deleted successfully');
        return redirect()->back();
    }

    public function filterCategories($id)
    {
        $categories =  Category::where('restaurant_id',$id)->get()->map(function ($row){
           return [
               'id'=>$row->id,
               'text'=>$row->name,
           ];
        });
        return response()->json($categories);
    }

//    meals

    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('Restaurant')) {
            $meals = Meal::where('restaurant_id', $user->restaurant->id)->get();
        } else {
            $meals = Meal::get();
        }
        return view('admin_panel.meals.index',compact('meals'));
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->hasRole('Restaurant')) {
            $categories = Category::where('restaurant_id', $user->restaurant->id)->get();
        } else {
            $categories = Category::get();
            $restaurants = Restaurant::get();
            return view('admin_panel.meals.create', compact('categories', 'restaurants'));
        }
        return view('admin_panel.meals.create',compact('categories'));
    }

    public function store(StoreMealRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        if (!isset($data['restaurant_id']))
            $data['restaurant_id'] = $user->restaurant->id;
        $data['image'] = $this->uploadImage($data['image']);
        Meal::create($data);
        $request->session()->flash('success', 'The Meal Stored Successfully');
        return redirect()->back();

    }

    public function delete($id)
    {
        $meal = Meal::find($id);
        $this->deleteImage($meal->image);
        $meal->delete();
        session()->flash('success', 'The Meal Deleted Successfully');
        return redirect()->back();
    }

}
