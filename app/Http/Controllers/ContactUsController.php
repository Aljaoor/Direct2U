<?php

namespace App\Http\Controllers;

use App\Http\Traits\SendWhatsappMessageTrait;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends Controller
{
    use SendWhatsappMessageTrait;
    public function getContactUsPage(){
        $user=auth()->user();
        return view('website.contact.contact_us',compact('user'));
    }
    public function send_message(Request $request)
    {
        $data=$request->all();
        $data['user_id']=auth()->user()->id;
        $data['user_name']=auth()->user()->name;
        $data['user_email']=auth()->user()->email;
        ContactUs::create($data);
        $this->sendWhatsappMessage(auth()->user()->mobile,__('alert.whatsapp_message2'));
        Alert::success(__('alert.success'),__('alert.store_message'));
        return back();

    }
    public function show_message(){
        $messages=ContactUs::get();
        return view('admin_panel.messages.messages',compact('messages'));
    }
    public function details_message($id){
        $messages=ContactUs::where('id',$id)->first();
        return view('admin_panel.messages.details_message',compact('messages'));

    }

}
