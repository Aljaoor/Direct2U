<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LocationController extends Controller
{
    public function newLocation(){
        return view('website.newLocation');
    }
    public function add_location(Request $request){
        $data=$request->all();
        $data['user_id']=auth()->id();
        $location=Location::where('user_id',auth()->id())->where('active',true)->first();
        if ($location){
        $location->active=false;
        $location->update();
        }
        Location::create($data);
        Alert::success(__('alert.success'),__('alert.store_location'));
        return redirect()->route('checkout.getCheckOut');
    }

}
