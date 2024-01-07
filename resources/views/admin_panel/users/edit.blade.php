@extends('layouts.admin_panel.main')
@section('header')
    update account details
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('users.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input value="{{ $user->name }}" type="text" class="form-control" required name="name"
                                   id="name" placeholder="Inter Your Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">User Email</label>
                        <div class="col-sm-10">
                            <input value="{{ $user->email }}" type="email" class="form-control" required name="email"
                                   id="staticEmail" placeholder="Onter Restaurants Email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">User Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" name="password"
                                   placeholder="Password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            `@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">User mobile</label>
                        <div class="col-sm-10">
                            <input value="{{ $user->mobile }}" type="tel" class="form-control" required name="mobile"
                                   id="mobile" placeholder="Inter Your Phone">
                            @error('mobile')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">User Role</label>
                        <div class="col-sm-10">
                            <select name="role" required class="form-control" id="role">
                                <option value="">choose role</option>
                                @foreach ( $roles as $role )
                                    @if($role->name == "Restaurant")
                                        @continue
                                    @endif
                                    <option value="{{ $role->id }}"
                                            @if($user->roles()->first()->id == $role->id) selected @endif> {{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="form-group mx-auto text-center button-style">
                        <br><br>
                        <button type="submit" class="btn btn-primary"> Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
