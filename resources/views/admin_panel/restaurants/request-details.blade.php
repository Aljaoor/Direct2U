@extends('layouts.admin_panel.main')
@section('header')
    Confirm Restaurant Details
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            @csrf
            <div class="container">
                <div class="form-group row">
                    <label for="user_name" class="col-sm-2 col-form-label">Restaurant Image</label>
                    <div class="col-sm-10">
                        <img src="{{asset($restaurant->image)}}" width="400" height="300">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="{{$restaurant->user->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Restaurant Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required disabled value="{{$restaurant->name}}"
                               id="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="{{$restaurant->city}}" id="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" disabled value="{{$restaurant->user->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" value="{{$restaurant->user->mobile}}" disabled
                               id="mobile">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="open_time" class="col-sm-2 col-form-label">Open Time :</label>
                    <div class="col-sm-10">
                        <input type="time" disabled class="form-control" value="{{$restaurant->open_time}}"
                               name="open_time" id="open_time">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="close_time" class="col-sm-2 col-form-label">Close Time :</label>
                    <div class="col-sm-10">
                        <input type="time" disabled class="form-control" value="{{$restaurant->close_time}}"
                               id="close_time">
                    </div>
                </div>
                @foreach(config('translatable.locales') as $locale)
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title @if ($locale=="en") English @else Arabic @endif : </label>
                        <div class="col-sm-10">
                            <input type="text" disabled class="form-control" id="title"
                                   value="{{$restaurant->translate($locale)->title}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description @if ($locale=="en") English @else Arabic @endif :</label>
                        <div class="col-sm-10">
                            <textarea disabled class="form-control" id="description"
                                      rows="5">{{$restaurant->translate($locale)->description}}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="form-group text-center ">
                <br><br>
                <a class="btn btn-success mx-auto" href="{{ route('restaurants.accept-request',$restaurant->id) }}">Accept</a>
                <a class="btn btn-danger mx-auto" href="{{ route('restaurants.accept-request',$restaurant->id) }}">Accept</a>
            </div>

        </div>
    </div>
@endsection
