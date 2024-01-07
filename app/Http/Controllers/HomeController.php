<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index($region = null)
    {
        if ($region == null)
            $selected_region = session()->get('region');
        else{
            session()->put('region', $region);
            $selected_region = $region;
        }
        $restaurants = Restaurant::where('city', $selected_region)->latest()->take(4)->get();
//        get rated meals
        $repeatedMeals = OrderDetails::select('meal_id')
            ->groupBy('meal_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)->get();

        $repeatedRestaurant = Restaurant::whereHas('meals', function ($query) use ($repeatedMeals) {
            $query->whereIn('id', $repeatedMeals);
        })->first();

        return view('website.home', compact('restaurants', 'repeatedRestaurant'));
    }

    public function dashboard()
    {
        return view('admin_panel.home');
    }

    public function chooseRegion()
    {
        return view('website.choose_region');
    }

    public function getAboutUs()
    {
        return view('website.aboutUs');
    }

    public function updateToken(Request $request)
    {
        try {
            $request->user()->update(['fcm_token' => $request->token]);
            return response()->json([
                'success'=>true
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }


}
