@extends('layouts.admin_panel.main')
@section('header')
    Update Restaurant Details
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('restaurants.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="form-group row">
                        <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="user_name" id="user_name"
                                   placeholder="Inter Restaurants Name" value="{{$restaurant->user->name}}">
                            @error('user_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Restaurant Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="name" value="{{$restaurant->name}}"
                                   id="name" placeholder="Inter Restaurants Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-sm-2 col-form-label">city</label>
                        <div class="col-sm-10">
                            <select name="city" required class="form-control" id="city">
                                <option @if('homs'==$restaurant->city)  selected @endif value="homs">homs</option>
                                <option @if('hama'==$restaurant->city)  selected @endif value="hama">hama</option>
                                <option @if('aleppo'==$restaurant->city)  selected @endif value="aleppo">aleppo</option>
                                <option @if('damascus'==$restaurant->city)  selected @endif value="damascus">damascus</option>
                                <option @if('daraa'==$restaurant->city)  selected @endif value="daraa">daraa</option>
                                <option @if('latakia'==$restaurant->city)  selected @endif value="latakia">latakia</option>
                                <option @if('tartous'==$restaurant->city)  selected @endif value="tartous">tartous</option>
                            </select>
                            @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" required value="{{$restaurant->user->email}}" name="email"
                                   id="staticEmail" placeholder="Onter Restaurants Email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control"  id="inputPassword" name="password" placeholder="Password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            `@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mobile" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" value="{{$restaurant->user->mobile}}" required name="mobile"
                                   id="mobile" placeholder="Inter Restaurants Phone">
                            @error('mobile')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" value="{{$restaurant->image}}" name="image"
                                   id="image">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="open_time" class="col-sm-2 col-form-label">open time :</label>
                        <div class="col-sm-10">
                            <input type="time" required class="form-control" value="{{$restaurant->open_time}}"
                                   name="open_time" id="open_time">
                            @error('open_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="close_time" class="col-sm-2 col-form-label">close time :</label>
                        <div class="col-sm-10">
                            <input type="time" required class="form-control" value="{{$restaurant->close_time}}"
                                   name="close_time" id="close_time">
                            @error('close_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @foreach(config('translatable.locales') as $locale)
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">title {{$locale}}: </label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" name="{{$locale}}[title]" id="title"
                                value="{{$restaurant->translate($locale)->title}}">
                                @error($locale.'.title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">description {{$locale}}:</label>
                            <div class="col-sm-10">
                            <textarea required class="form-control" name="{{$locale}}[description]" id="description"
                                      rows="5">{{$restaurant->translate($locale)->description}}</textarea>
                                @error($locale.'.description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                </div>
                <input name="id" type="hidden" value="{{$restaurant->id}}">

                <div class="form-group row ">
                    <br><br>
                    <button type="submit" class="btn btn-primary mx-auto"> update</button>
                </div>

            </form>
        </div>
    </div>
@endsection
