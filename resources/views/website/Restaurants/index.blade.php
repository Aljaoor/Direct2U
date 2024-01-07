@extends('layouts.website.main')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/restaurants.css') }}">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
@endpush
@section('content')
    @php
        $langArabcicBool = App::getLocale() == 'ar' ? true : false;
    @endphp
    <div @if ($langArabcicBool) dir="rtl" @endif>
        <section class="pager-section text-center" style="height: 500px; display: flex;align-items: center">
            <div class="fixed-bg bg4"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="pager-head">
                    <h2 st>@lang('Restaurants.All')</h2>
                </div>
                <!--pager-head end-->
            </div>
        </section>
        <!--pager-section end-->

        <section class="sec-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-md-1 order-sm-1 order-col-1">
                        <div class="sidebar left-sidebar">
                            <form method="POST" action="{{ route('restaurants.filter') }}">
                                @csrf
                                <div class="widget widget-filter  @if ($langArabcicBool) text-right @endif">
                                    <h3 class="widget-title  @if ($langArabcicBool) text-right @endif">
                                        @lang('Restaurants.Filter')</h3>
                                    <ul>
                                        @foreach ($allCat as $categ)
                                            <li>
                                                <label class="label">{{ $categ }}
                                                    <input name="categories[]" type="checkbox" value="{{ $categ }}">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--widget-filter end-->
                                <div class="rating d-block">
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                </div>
                                <input type="hidden" name="rate" id="starrating">
                                <button type="submit" class="btn-default w-100 mar-top">@lang('Restaurants.Search')</button>
                            </form>
                        </div>
                        <!--sidebar end-->
                    </div>
                    <div class="col-lg-9" dir="ltr">
                        <div class="search-prod">
                            <form>
                                <div class="form-group dropdown">
                                    <input type="text" name="search" id="restaurant-search"
                                        placeholder="@lang('Restaurants.Search')" class="form-control dropdown-toggle half-radius"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div id="suggestions-container" class="dropdown-menu"
                                        aria-labelledby="restaurant-search">
                                    </div>
                                    <button type="submit" class="btn-default half-radius">@lang('Restaurants.Search_Restaurant')</button>
                                </div>
                            </form>
                        </div>
                        <!--search-prod end-->
                        <div class="listing-products">
                            @foreach ($restuarants as $restuarant)
                                <div class="listing-product">
                                    <div class="product-thumb">
                                        <img src={{ asset($restuarant->image) }} alt="" class="w-100">
                                    </div>
                                    <div class="product-info">
                                        <h3 style="margin-top: 18px"
                                            @if ($langArabcicBool) class="float-right" @endif><a
                                                href="{{ route('restaurants.get-details', $restuarant->id) }}"
                                                style="text-decoration: none">{{ $restuarant->name }}</a>
                                        </h3>
                                        <ul class="rating">
                                            <li><i
                                                    class=" @if ($restuarant->rate() >= 1) fa @else far @endif fa-star"></i>
                                            </li>
                                            <li><i
                                                    class=" @if ($restuarant->rate() >= 2) fa @else far @endif fa-star"></i>
                                            </li>
                                            <li><i
                                                    class=" @if ($restuarant->rate() >= 3) fa @else far @endif fa-star"></i>
                                            </li>
                                            <li><i
                                                    class=" @if ($restuarant->rate() >= 4) fa @else far @endif fa-star"></i>
                                            </li>
                                            <li><i
                                                    class=" @if ($restuarant->rate() >= 5) fa @else far @endif fa-star"></i>
                                            </li>
                                        </ul>
                                        <p @if ($langArabcicBool) class="text-right" @endif>
                                            {{ $restuarant->title }}...</p>
                                        <div
                                            style="display: flex ; justify-content: space-between;  @if (!$langArabcicBool) margin-bottom: 10px; @endif">
                                            <ul class="btm" dir="ltr" style="padding: 0px">
                                                <li><a>@lang('Restaurants.Restaurant')</a></li>
                                                <li>
                                                    @if (Carbon\Carbon::now()->between(Carbon\Carbon::createFromTimeString($restuarant->open_time),
                                                            Carbon\Carbon::createFromTimeString($restuarant->close_time)))
                                                        <span><b class="statuss"></b>@lang('Restaurants.Open')</span>
                                                    @else
                                                        <span><b class="statuss closed"></b>@lang('Restaurants.Close')</span>
                                                    @endif
                                                </li>
                                            </ul>
                                            <div class="clearfix">
                                                <a href="{{ route('restaurants.get-details', $restuarant->id) }}"
                                                    class="view-menu">
                                                    @if ($langArabcicBool)
                                                        @lang('Restaurants.View_Menu')
                                                        <i class="fa fa-long-arrow-alt-left"></i>
                                                    @else
                                                        @lang('Restaurants.View_Menu')
                                                        <i class="fa fa-long-arrow-alt-right"></i>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--listing-product end-->
                            @endforeach

                        </div>
                    </div>
                </div>
                <div>
        </section>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- jQuery -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <!-- Popper.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        @push('js')
            <script>
                $(document).ready(function() {
                    $('#restaurant-search').keyup(function() {
                        var query = $(this).val();

                        if (query !== '') {
                            $.ajax({
                                url: '{{ route('restaurants.search') }}',
                                method: 'GET',
                                data: {
                                    query: query
                                },
                                success: function(response) {
                                    var suggestionsContainer = $('#suggestions-container');
                                    suggestionsContainer.empty();

                                    if (response.length > 0) {
                                        response.forEach(function(restaurant) {
                                            var suggestion =
                                                '<a class="dropdown-item suggestion" href="{{ route('restaurants.get-details', ['id' => ':id']) }}">' +
                                                restaurant.name + '</a>';
                                            suggestion = suggestion.replace(':id', restaurant
                                                .id);
                                            suggestionsContainer.append(suggestion);
                                        });
                                    } else {
                                        suggestionsContainer.append(
                                            '<a class="dropdown-item">No suggestions found</a>');
                                    }
                                }
                            });
                        } else {
                            $('#suggestions-container').empty();
                        }
                    });
                    messaging.onMessage(function({
                        data: {
                            body,
                            title
                        }
                    }) {
                        Swal.fire(
                            'Accepted',
                            'Your request has been accepted',
                            'success'
                        )
                        new Notification(title, {
                            body
                        });
                    });
                });
            </script>
        @endpush
    </div>
@endsection
