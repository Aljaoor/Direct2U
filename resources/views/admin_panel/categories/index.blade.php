@extends('layouts.admin_panel.main')
@section('header')
    Add a new categories
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success " role="alert">
            <button class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('meals.StoreCategory')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    @foreach(config('translatable.locales') as $locale)
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Category Name in @if ($locale=="en") English @else Arabic @endif : </label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" name="{{$locale}}[name]" id="name">
                                @error($locale.'.name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                    @if(!auth()->user()->hasRole(['Restaurant']))
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Restaurant</label>
                            <div class="col-sm-10">
                                <select name="restaurant_id" required class="form-control" id="restaurant_id">
                                    <option value="">choose restaurant</option>
                                    @foreach ( $restaurants as $restaurant)
                                        <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                                    @endforeach
                                </select>
                                @error('restaurant_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endif
                    <div class="form-group float-right">
                        <br>
                        <button type="submit" class="btn btn-primary mr-5" style="width: 80%;"> Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Row -->
    <div class="card mt-3">
        <div class="card-body">
            <div class="row mx-auto">
                <div class="col-md-12 col-lg-12 ">
                    <div class="card mx-auto ">
                        <div class="card-header border-bottom-0">
                            <h3 class="card-title">Category Management</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap"
                                   style="text-align: center">
                                <thead class="bg-white ">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    @if(!auth()->user()->hasRole(['Restaurant']))
                                        <th>restaurant</th>
                                    @endif
                                    <th width="280px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <th>{{++$i}}</th>
                                        <td>{{$category->name}}</td>
                                        @if(!auth()->user()->hasRole(['Restaurant']))
                                            <td>{{$category->restaurant->name}}</td>
                                        @endif
                                        <td>
                                            <a class="btn btn-danger"
                                               href="{{ route('meals.deleteCategory',$category->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->


@endsection

