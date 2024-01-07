@extends('layouts.admin_panel.main')
@section('header')
    Add a new meal
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
            <form action="{{route('meals.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    @if(!auth()->user()->hasRole(['Restaurant']))
                        <div class="form-group row">
                            <label for="restaurant" class="col-sm-2 col-form-label">Restaurant</label>
                            <div class="col-sm-10">
                                <select name="restaurant_id" required class="form-control" id="restaurant">
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
                    <div class="form-group row">
                        <label for="categories" class="col-sm-2 col-form-label">Categories</label>
                        <div class="col-sm-10">
                            <select name="category_id" required class="form-control" id="categories">
                                <option value="">choose Categories</option>
                                @foreach ( $categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Meals Image</label>
                        <div class="col-sm-10">
                            <input type="file" required class="form-control" name="image" id="image">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @foreach(config('translatable.locales') as $locale)
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Meals Name in @if ($locale=="en") English @else Arabic @endif : </label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" name="{{$locale}}[name]" id="name">
                                @error($locale.'.name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" required name="price" id="price"
                                   placeholder="Price SP">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <br>
                    <button type="submit" class="btn btn-primary mr-5 button-style" > Save</button>
                </div>
            </form>
        </div>
    </div>

    @if(!auth()->user()->hasRole(['Restaurant']))
        @push('js')
            <script>
                $(document).ready(function () {
                    $('#categories').select2();
                    $('#categories').empty();
                    $('#restaurant').on('change', function () {
                        let restaurant_id = $(this).val();
                        let url = "{{ route('meals.filter-categories', ':id') }}";
                        url = url.replace(':id', restaurant_id);
                        console.log(url);
                        $.ajax({
                            url: url,
                            type: 'get',
                            dataType: 'json',
                            success: function (response) {
                                $('#categories').empty();
                                $('#categories').select2({data: response});
                            }
                        });
                    });
                });
            </script>
        @endpush
    @endif
@endsection

