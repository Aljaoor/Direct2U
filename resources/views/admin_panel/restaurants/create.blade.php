@extends('layouts.admin_panel.main')
@section('header')
    Create a New Restaurant
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success " role="alert"><button class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('restaurants.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="form-group row">
                        <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="user_name" id="user_name"
                                placeholder="Your your Name">
                            @error('user_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Restaurant Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="name" id="name"
                                   placeholder="Inter Restaurants Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                            <select name="city" required class="form-control" id="city">
                                <option value="">choose city</option>
                                <option value="homs">Homs</option>
                                <option value="hama">Hama</option>
                                <option value="aleppo">Aleppo</option>
                                <option value="damascus">Damascus</option>
                                <option value="daraa">Daraa</option>
                                <option value="latakia">Latakia</option>
                                <option value="tartous">Tartous</option>
                            </select>
                            @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" required name="email" id="staticEmail"
                                placeholder="Inter Restaurants Email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" required name="password"
                                placeholder="Password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            `@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Mobile :</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" required name="mobile" id="mobile"
                                placeholder="Inter Restaurants Phone">
                            @error('mobile')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" required class="form-control" name="image" id="image">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="open_time" class="col-sm-2 col-form-label">Open Time :</label>
                        <div class="col-sm-10">
                            <input type="time" required class="form-control" name="open_time" id="open_time">
                            @error('open_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="close_time" class="col-sm-2 col-form-label">Close Time :</label>
                        <div class="col-sm-10">
                            <input type="time" required class="form-control" name="close_time" id="close_time">
                            @error('close_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                    @foreach(config('translatable.locales') as $locale)
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title @if($locale==="ar") Arabic @else English @endif : </label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" name="{{$locale}}[title]" id="title"
                                       placeholder="Restaurants title">
                                @error($locale.'.title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Description @if($locale==="ar") Arabic @else English @endif :</label>
                            <div class="col-sm-10">
                            <textarea required class="form-control" name="{{$locale}}[description]" id="description"
                                      rows="5"  placeholder="Restaurants description"></textarea>
                                @error($locale.'.description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="form-group text-center">
                    <br><br>
                    <button type="submit" class="btn btn-primary "> Save</button>
                </div>

            </form>
        </div>
    </div>

@endsection
