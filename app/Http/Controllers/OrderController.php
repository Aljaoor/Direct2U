<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\SendPushNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function unprocessedOrders()
    {
        return view('admin_panel.orders.unprocessed-orders');
    }

    public function finishedOrders()
    {
        return view('admin_panel.orders.finished-orders');
    }


    public function getOrders(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::where('status', '!=', '5')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user name', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('user mobile', function ($row) {
                    return $row->user->mobile;
                })
                ->addColumn('location street', function ($row) {
                    return $row->location->street;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status === 'pending')
                        $status = '<button class="btn" style="background-color: #babbbd">pending</button>';
                    elseif ($row->status === 'In preparation')
                        $status = '<button class="btn btn-primary">In preparation</button>';
                    elseif ($row->status === 'Delivery on the way')
                        $status = '<button class="btn btn-info">Delivery on the way</button>';
                    else
                        $status = '<button class="btn btn-info">btn btn-success</button>';
                    return $status;
                })
                ->addColumn('price', function ($row) {
                    return $row->price()+5000;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="';
                    $actionBtn .= route('orders.details', $row->id) ;
                    $actionBtn .= '"class="edit btn btn-primary btn-sm">Details</a> <a href="';
                    $actionBtn .= route('orders.delete', $row->id) ;
                    $actionBtn .= '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
    }

    public function getFinishedOrdersData(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::where('status',5)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user name', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('user mobile', function ($row) {
                    return $row->user->mobile;
                })
                ->addColumn('location street', function ($row) {
                    return $row->location->street;
                })
                ->addColumn('status', function ($row) {
                        $status = '<button class="btn btn-success">Done</button>';
                    return $status;
                })
                ->addColumn('price', function ($row) {
                    return $row->price()+5000;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="';
                    $actionBtn .= route('orders.details', $row->id) ;
                    $actionBtn .= '"class="edit btn btn-primary btn-sm">Details</a> <a href="';
                    $actionBtn .= route('orders.delete', $row->id) ;
                    $actionBtn .= '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

    }

    public function delete($id)
    {
        Order::find($id)->delete();
        Alert::success('successfully', 'the order delete successfully');
        return redirect()->back();
    }

    public function details($id)
    {
        $order = Order::find($id);
        return view('admin_panel.orders.details', compact('order'));
    }

    public function accept($id)
    {
        $order = Order::find($id);
        $order->update(['status' => 2]);
        //send notification
        $fcmTokens = User::find($order->user_id)->pluck('fcm_token')->toArray();
        Notification::send(null,new SendPushNotification("Your request has been accepted","We will walk you through all the stages",$fcmTokens));

        session()->flash('success', 'The order accept successfully');
        return view('admin_panel.orders.unprocessed-orders');
    }

    public function startDelivery($id)
    {
        $order = Order::find($id);
        $order->update(['status' => 3]);
        //send notification
        $fcmTokens = User::find($order->user_id)->pluck('fcm_token')->toArray();
        Notification::send(null,new SendPushNotification("The order is on the way","The delivery man is on his way to you. He will arrive as soon as possible",$fcmTokens));

        session()->flash('success', 'The order updated successfully');
        return view('admin_panel.orders.unprocessed-orders');
    }

    public function done($id)
    {
        $order = Order::find($id);
        $order->update(['status' => 5]);
        //send notification
        $fcmTokens = User::find($order->user_id)->pluck('fcm_token')->toArray();
        Notification::send(null,new SendPushNotification("Done","Thank you for using our application",$fcmTokens));

        session()->flash('success', 'The order accept successfully');
        return view('admin_panel.orders.unprocessed-orders');
    }


}
