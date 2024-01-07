<?php

namespace App\Http\Controllers;

use App\Http\Traits\SendWhatsappMessageTrait;
use App\Models\Location;
use App\Models\Meal;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use App\Notifications\SendPushNotification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CheckoutController extends Controller
{
    use SendWhatsappMessageTrait;
    public function addMealToCard(Request $request)
    {
        $mealId = $request->input('meal_id');
        $cart = session()->get('cart', []);
        if (isset($cart[$mealId])) {
            return response()->json("exists");
        }
        $cart[$mealId] = 1;
        session()->put('cart', $cart);
        $cartCount = count($cart);
        return response()->json($cartCount);
    }

    public function getCartPage()
    {
        $cart = session('cart', []);
        $meals_ids = array_keys($cart);
        $meals = Meal::whereIn('id', $meals_ids)->get();
        $subTotal = 0;
        foreach ($meals as $meal){
            $subTotal += $cart[$meal->id]*$meal->price;
        }
        $total = $subTotal + 5000 ;
        return view('website.cart.cart', compact('meals','subTotal','total'));
    }

    public function getCheckOut()
    {
        $cart = session('cart', []);
        $meals_ids = array_keys($cart);
        $meals = Meal::whereIn('id', $meals_ids)->get();
        $user = auth()->user();
        $locactions = $user->locactions;
        $location = Location::where('user_id', $user->id)->where('active', true)->first();
        if (!$location) {
            return view('website.newLocation');
        }
        return view('website.checkout.step1', compact(
            'locactions',
            'user',
            'location',
            'meals',
        ));
    }

    public function showLocationById($id)
    {
        $location = Location::where('user_id', auth()->id())->where('active', true)->first();

        if ($location) {
            $location->active = false;
            $location->update();
        }
        $location = Location::where('id', $id)->first();
        $location->active = true;
        $location->update();
        return $this->getCheckOut();
    }

    public function increaseQuantity(Request $request)
    {
        $cart = session()->get('cart', []);
        $cart[$request->input('meal_id')] += 1;
        session()->put('cart', $cart);
        return response()->json('success');
    }

    public function decreaseQuantity(Request $request)
    {
        $cart = session()->get('cart', []);
        if ($cart[$request->input('meal_id')] == 1)
            return response()->json('you can\'t make quantity zero');
        $cart[$request->input('meal_id')] -= 1;
        session()->put('cart', $cart);
        return response()->json('success');
    }

    public function removeMeal(Request $request)
    {
        $cart = session()->get('cart', []);
        $meal_id = $request->input('meal_id');
        if (!isset($cart[$meal_id]))
            return response()->json('the meal not exists in session storage');
        unset($cart[$meal_id]);
        session()->put('cart', $cart);
        return response()->json('success');
    }

    public function step2(Request $request)
    {
        $cart = session('cart', []);
        $meals_ids = array_keys($cart);
        $meals = Meal::whereIn('id', $meals_ids)->get();
        session()->put('location_id',$request->location_id);
        session()->put('order_note',$request->order_note);
        return view('website.checkout.step2', compact('meals'));
    }

    public function confirm(Request $request)
    {
        $cart = session('cart', []);
        $order =  Order::create([
            'user_id'=>auth()->id(),
            'location_id'=>\session('location_id'),
            'payment_type'=>$request->payment_type,
            'order_note'=>\session('order_note'),
        ]);
        $meals_ids = array_keys($cart);
        $meals = Meal::whereIn('id', $meals_ids)->get();
        $data = [];
        foreach ($meals as $meal) {
            $data[] = [
                'order_id' => $order->id,
                'meal_id' => $meal->id,
                'price' => $meal->price * $cart[$meal->id],
                'quantity' => $cart[$meal->id],
            ];
        }
        $orderMeals = OrderDetails::insert($data);
        session()->forget('location_id');
        session()->forget('order_note');
        session()->forget('cart');
        #send whatsapp notification
        $this->sendWhatsappMessage($order->user->mobile,__('alert.whatsapp_message'));
        //send notification
        $fcmTokens = User::whereHas('roles', function ($query) {
            $query->where('roles.name', 'admin');
        })->pluck('fcm_token')->toArray();
        Notification::send(null, new SendPushNotification("New Order", "There is a new request to check", $fcmTokens));

        return view('website.checkout.step3', compact('order'));
    }


}
