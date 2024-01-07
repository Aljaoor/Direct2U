<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantsRequest\StoreRestaurantRequest;
use App\Http\Requests\UserRequests\StoreUserRequest;
use App\Http\Requests\UserRequests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::get();
        return view('admin_panel.users.create',compact('roles'));

    }

    public function index()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Restaurant');
        })->get();

        return view('admin_panel.users.index', compact('users'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        $role = Role::findById($request->role)->name;
        $user->assignRole($role);
        $request->session()->flash('success','saved successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();
        return view('admin_panel.users.edit',compact('user','roles'));

    }

    public function update(UpdateUserRequest $request)
    {
        $data = $request->validated();
        if (!$data['password'])
           $data = Arr::except($data,'password');
        else{
            $data['password'] = Hash::make($data['password']);
        }
        $user = User::find($data['id']);
        $user->removeRole($user->getRoleNames()[0]);
        $role = Role::findById($data['role'])->name;
        $user->assignRole($role);
        $user->update($data);
        $request->session()->flash('success','updated successfully');
        return redirect()->route('users.index');

    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('success','deleted successfully');
        return back();

    }

    public function registerAsRestaurant()
    {
        return view('auth.register-as-restaurant');
    }

}
