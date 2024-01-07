@extends('layouts.website.main')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/restaurants.css') }}">
@endpush
@section('content')
    @php
        $langArabcicBool = App::getLocale() == 'ar' ? true : false;
    @endphp
    <div @if ($langArabcicBool) dir="rtl" @endif>
        <section class="main-banner">
            <div class="overlay" style="z-index: 0;height: 100%;width: 100%"> </div>
            <div class="container ">
                <div class="banner-text" style="position: relative; z-index: 2">
                    <h2 style="color: rgba(212, 146, 24, 0.979);">@lang('home.description')</h2>
                    <span class="semi-bold text-capitalize">@lang('home.delivered')</span>
                    <form>
                        <div class="form-group dropdown">
                            <input
                                @if ($langArabcicBool) style="padding: 0px 210px 0px 0px;font-size: 16px" @endif
                                type="text" name="search" id="restaurant-search" placeholder="@lang('home.Search')"
                                class="form-control dropdown-toggle half-radius" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <div id="suggestions-container" class="dropdown-menu" aria-labelledby="restaurant-search"></div>
                            <button type="submit" class="btn-default half-radius">@lang('home.Search_Restaurant')</button>
                        </div>
                    </form>
                </div>
                </section>


        <section class="services-section"
            @if ($langArabcicBool) style="margin-top: -110px; padding: 0px 0px 140px" @endif>
            <div class="container">
                <div class="services-sec">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="service">
                                <h2 class="semi-bold">01.</h2>
                                <span class="text-uppercase"><img
                                        src="{{ asset('website') }}}/assets/images/icons/location.svg"
                                        alt="">@lang('home.How_the_site_works.first.step1')</span>
                                <h4 class="semi-bold text-capitalize"><a href="#" title="">@lang('home.How_the_site_works.first.title')</a>
                                </h4>
                                <p> @lang('home.How_the_site_works.first.explanation') </p>
                            </div>
                            <!--service end-->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="service" @if ($langArabcicBool) style="height: 239px" @endif>
                                <h2 class="semi-bold">02.</h2>
                                <span class="text-uppercase"><img
                                        src="{{ asset('website') }}
                                /assets/images/icons/meat.svg"
                                        alt="">@lang('home.How_the_site_works.second.step2') </span>
                                <h4 class="semi-bold text-capitalize"><a href="#" title="">@lang('home.How_the_site_works.second.title')
                                    </a>
                                </h4>
                                <p>@lang('home.How_the_site_works.second.explanation') </p>
                            </div>
                            <!--service end-->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="service">
                                <h2 class="semi-bold">03.</h2>
                                <span class="text-uppercase"><img src="{{ asset('website') }}}/assets/images/icons/box.svg"
                                        alt="">@lang('home.How_the_site_works.third.step3')</span>
                                <h4 class="semi-bold text-capitalize"><a href="#"
                                        title="">@lang('home.How_the_site_works.third.title')</a></h4>
                                <p>@lang('home.How_the_site_works.third.explanation')</p>
                            </div>
                            <!--service end-->
                        </div>
                    </div>
                </div>
                <!--services end-->
            </div>
        </section>
        <!--services section end-->

        <section class="sec-block" style="padding:0px" @if ($langArabcicBool) dir="ltr" @endif>
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="text-capitalize">@lang('home.header.restaurants')</h2>
                    <p class="mx-auto">
                        @lang('home.best_restaurants')
                    </p>
                </div>
                <!--sec-title end-->
                <div class="featured-sec">
                    <div class="row mb-70">
                        @if (isset($restaurants[0]))
                            <div class="col-md-6" style="height: 400px">
                                <div class="featured-item">
                                    <img src="{{ asset($restaurants[0]->image) }}" alt="" class="w-100"
                                        style="width: 100% ; height: 100%; object-fit: fill" />
                                    <ul class="ftz" @if ($langArabcicBool) style="padding: 0px" @endif>
                                        <li @if ($langArabcicBool) style="width: 207px" @endif>
                                            <span class="handle-display">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.8333 3.33337H4.16667C3.24619 3.33337 2.5 4.07957 2.5 5.00004V16.6667C2.5 17.5872 3.24619 18.3334 4.16667 18.3334H15.8333C16.7538 18.3334 17.5 17.5872 17.5 16.6667V5.00004C17.5 4.07957 16.7538 3.33337 15.8333 3.33337Z"
                                                        stroke="#D8AB37" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.5 8.33337H17.5" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M13.3333 1.66663V4.99996" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.66669 1.66663V4.99996" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            @lang('home.Saturday') - @lang('home.Friday')
                                        </li>
                                        <li @if ($langArabcicBool) style="width: 207px" @endif>
                                            <span class="handle-display">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10 18.3333C14.6024 18.3333 18.3334 14.6023 18.3334 9.99996C18.3334 5.39759 14.6024 1.66663 10 1.66663C5.39765 1.66663 1.66669 5.39759 1.66669 9.99996C1.66669 14.6023 5.39765 18.3333 10 18.3333Z"
                                                        stroke="#D8AB37" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M10 5V10L13.3333 11.6667" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            {{ $restaurants[0]->open_time }} AM - {{ $restaurants[0]->close_time }} PM
                                        </li>
                                    </ul>
                                    <div class="feat-optz">
                                        <span class="text-capitalize">@lang('home.restaurant')</span>
                                        <h2 class="text-capitalize">
                                            <a href="{{ route('restaurants.get-details', $restaurants[0]->id) }}"
                                                title="">{{ $restaurants[0]->name }}</a>
                                        </h2>
                                    </div>
                                </div>
                                <!--featured-item end-->
                            </div>
                        @endif
                        @if (isset($restaurants[1]))
                            <div class="col-md-6" style="height: 400px">
                                <div class="featured-item">
                                    <img src="{{ asset($restaurants[1]->image) }}" alt="" class="w-100"
                                        style="width: 100% ; height: 100%; object-fit: fill" />
                                    <ul class="ftz" @if ($langArabcicBool) style="padding: 0px" @endif>
                                        <li @if ($langArabcicBool) style="width: 207px" @endif>
                                            <span class="handle-display">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.8333 3.33337H4.16667C3.24619 3.33337 2.5 4.07957 2.5 5.00004V16.6667C2.5 17.5872 3.24619 18.3334 4.16667 18.3334H15.8333C16.7538 18.3334 17.5 17.5872 17.5 16.6667V5.00004C17.5 4.07957 16.7538 3.33337 15.8333 3.33337Z"
                                                        stroke="#D8AB37" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.5 8.33337H17.5" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M13.3333 1.66663V4.99996" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.66669 1.66663V4.99996" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            @lang('home.Saturday') - @lang('home.Friday')
                                        </li>
                                        <li @if ($langArabcicBool) style="width: 207px" @endif>
                                            <span class="handle-display">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10 18.3333C14.6024 18.3333 18.3334 14.6023 18.3334 9.99996C18.3334 5.39759 14.6024 1.66663 10 1.66663C5.39765 1.66663 1.66669 5.39759 1.66669 9.99996C1.66669 14.6023 5.39765 18.3333 10 18.3333Z"
                                                        stroke="#D8AB37" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M10 5V10L13.3333 11.6667" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            {{ $restaurants[1]->open_time }} AM - {{ $restaurants[1]->close_time }} PM
                                        </li>
                                    </ul>
                                    <div class="feat-optz">
                                        <span class="text-capitalize">@lang('home.restaurant') </span>
                                        <h2 class="text-capitalize">
                                            <a href="{{ route('restaurants.get-details', $restaurants[1]->id) }}"
                                                title="">{{ $restaurants[1]->name }}</a>
                                        </h2>
                                    </div>
                                </div>
                                <!--featured-item end-->
                            </div>
                        @endif
                        @if (isset($restaurants[2]))
                            <div class="col-md-8" style="height: 400px">
                                <div class="featured-item">
                                    <img src="{{ asset($restaurants[2]->image) }}" alt="" class="w-100"
                                        style="width: 100% ; height: 100%; object-fit: fill" />
                                    <ul class="ftz" @if ($langArabcicBool) style="padding: 0px" @endif>
                                        <li @if ($langArabcicBool) style="width: 207px" @endif>
                                            <span class="handle-display">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.8333 3.33337H4.16667C3.24619 3.33337 2.5 4.07957 2.5 5.00004V16.6667C2.5 17.5872 3.24619 18.3334 4.16667 18.3334H15.8333C16.7538 18.3334 17.5 17.5872 17.5 16.6667V5.00004C17.5 4.07957 16.7538 3.33337 15.8333 3.33337Z"
                                                        stroke="#D8AB37" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.5 8.33337H17.5" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M13.3333 1.66663V4.99996" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.66669 1.66663V4.99996" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            @lang('home.Saturday') - @lang('home.Friday')
                                        </li>
                                        <li @if ($langArabcicBool) style="width: 207px" @endif>
                                            <span class="handle-display">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10 18.3333C14.6024 18.3333 18.3334 14.6023 18.3334 9.99996C18.3334 5.39759 14.6024 1.66663 10 1.66663C5.39765 1.66663 1.66669 5.39759 1.66669 9.99996C1.66669 14.6023 5.39765 18.3333 10 18.3333Z"
                                                        stroke="#D8AB37" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M10 5V10L13.3333 11.6667" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            {{ $restaurants[2]->open_time }} AM - {{ $restaurants[2]->close_time }} PM
                                        </li>
                                    </ul>
                                    <div class="feat-optz">
                                        <span class="text-capitalize">@lang('home.restaurant')</span>
                                        <h2 class="text-capitalize">
                                            <a href="{{ route('restaurants.get-details', $restaurants[2]->id) }}"
                                                title="">{{ $restaurants[2]->name }}</a>
                                        </h2>
                                    </div>
                                </div>
                                <!--featured-item end-->
                            </div>
                        @endif
                        @if (isset($restaurants[3]))
                            <div class="col-md-4 last-restuarant" style="height: 400px">
                                <div class="featured-item">
                                    <img src="{{ asset($restaurants[3]->image) }}" alt="" class="w-100"
                                        style="width: 100% ; height: 100%; object-fit: fill" />
                                    <ul class="ftz" @if ($langArabcicBool) style="padding: 0px" @endif>
                                        <li @if ($langArabcicBool) style="width: 207px" @endif>
                                            <span class="handle-display">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.8333 3.33337H4.16667C3.24619 3.33337 2.5 4.07957 2.5 5.00004V16.6667C2.5 17.5872 3.24619 18.3334 4.16667 18.3334H15.8333C16.7538 18.3334 17.5 17.5872 17.5 16.6667V5.00004C17.5 4.07957 16.7538 3.33337 15.8333 3.33337Z"
                                                        stroke="#D8AB37" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.5 8.33337H17.5" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M13.3333 1.66663V4.99996" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.66669 1.66663V4.99996" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            @lang('home.Saturday') - @lang('home.Friday')
                                        </li>
                                        <li @if ($langArabcicBool) style="width: 207px" @endif>
                                            <span class="handle-display">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10 18.3333C14.6024 18.3333 18.3334 14.6023 18.3334 9.99996C18.3334 5.39759 14.6024 1.66663 10 1.66663C5.39765 1.66663 1.66669 5.39759 1.66669 9.99996C1.66669 14.6023 5.39765 18.3333 10 18.3333Z"
                                                        stroke="#D8AB37" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M10 5V10L13.3333 11.6667" stroke="#D8AB37" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            {{ $restaurants[3]->open_time }} AM - {{ $restaurants[3]->close_time }} PM
                                        </li>
                                    </ul>
                                    <div class="feat-optz">
                                        <span class="text-capitalize">@lang('home.restaurant')</span>
                                        <h2 class="text-capitalize">
                                            <a href="{{ route('restaurants.get-details', $restaurants[3]->id) }}"
                                                title="">{{ $restaurants[3]->name }}</a>
                                        </h2>
                                    </div>
                                </div>
                                <!--featured-item end-->
                            </div>
                        @endif

                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <a href="restaurants.html" title="" class="btn-default">@lang('home.view_all_list')
                                <span></span></a>
                        </div>
                    </div>
                </div>
                <!--featured-sec end-->
            </div>
        </section>
        <!--featured-section end-->


        <section class="sec-block">
            <div class="container">
                <div class="section-title text-center">
                    <span>@lang('home.The_reason_why')</span>
                    <h2 class="text-capitalize">@lang('home.Why_People_Choose_Us')</h2>
                    <p class="mx-auto">@lang('home.Advantages')</p>
                </div>
                <!--sec-title end-->
                <div class="our-proptz text-center">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="proptz">
                                <div class="propt-icon">
                                    <img src="{{ asset('website/assets/images/icons/discount.svg') }}" alt="">
                                </div>
                                <h3 class="semi-bold text-capitalize">@lang('home.Our_site_features.first_feature.title')</h3>
                                <p>@lang('home.Our_site_features.first_feature.description')</p>
                            </div>
                            <!--proptz end-->
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="proptz">
                                <div class="propt-icon">
                                    <img src="{{ asset('website/assets/images/icons/delivery.svg') }}" alt="">
                                </div>
                                <h3 class="semi-bold text-capitalize">@lang('home.Our_site_features.second_feature.title')</h3>
                                <p>@lang('home.Our_site_features.second_feature.description')</p>
                            </div>
                            <!--proptz end-->
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="proptz">
                                <div class="propt-icon">
                                    <img src="{{ asset('website/assets/images/icons/food.svg') }}" alt="">
                                </div>
                                <h3 class="semi-bold text-capitalize">@lang('home.Our_site_features.third_feature.title')</h3>
                                <p>@lang('home.Our_site_features.third_feature.description')</p>
                            </div>
                            <!--proptz end-->
                        </div>
                    </div>
                </div>
                <!--our-proptz end-->
            </div>
        </section>
        <!--our-proptz-section end-->



        <section class="sec-block first-order" style="padding-bottom: 75px">
            <div class="fixed-bg " style="background-image: url({{ asset('website/assets/images/pizza026.jpg') }})">
            </div>
            <div class="overlay"></div>
            <div class="container">
                <div class="promotion">
                    <h2 class="text-capitalize">@lang('home.First_Order')</h2>
                    <span class="text-capitalize semi-bold" style="color: lightgray">@lang('home.delivered')</span>
                    <p @if ($langArabcicBool) style="padding: 0px" @endif>@lang('home.section_desc')</p>
                    <a href="restaurants.html" title="" class="btn-default">@lang('home.Order_Products')<span></span></a>
                </div>
                <!--promotion end-->

            </div>

        </section>
        @if($repeatedRestaurant)
    <section class="sec-block menu-padding" style="padding: 140px 0">
            <div class="container">
                @if($repeatedRestaurant)
                <div class="section-title text-center">
                    <span>Amazing taste </span>
                    <h2 class="text-capitalize">Popular dishes</h2>
                </div>
                @endif
                <!--sec-title end-->
                <div class="popular-dishes style2 text-center">
                    <div class="options">
                        <div class="option-isotop">
                            <ul id="filter" class="option-set filters-nav" data-option-key="filter">
                                @if($repeatedRestaurant)
                                <li>
                                    <a class="selected" data-option-value=".meat">@lang('details.all')</a>
                                </li>
                                {{-- @if($repeatedRestaurant) --}}
                                @foreach ($repeatedRestaurant->categories as $category)
                                    <li>
                                        <a data-option-value=".{{ $category->id }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!--options end-->
                    <div class="row">
                        <div  class="masonary handel-show" style="padding: 0px">
                         @if($repeatedRestaurant)
                            @foreach ($repeatedRestaurant->meals as $meal)
                                <div class="col-lg-4 col-md-4 col-sm-6 meat {{ $meal->category_id }}">
                                    <div class="pd-item handel-card">
                                        <div class="pd-thumbnail">
                                            <img src="{{ $meal->image }}" alt="" class="w-100" style="height: 271px"/>
                                        </div>
                                        <h3 class="semi-bold text-capitalize">
                                            <a href="#" title="">{{ $meal->name }}</a>
                                        </h3>
                                        <strong class="semi-bold">{{ $meal->price }} @lang('details.S_P')</strong>
                                        <a href="#" title=""
                                           class="btn-default gradient-bg half-radius height-2 add-to-cart-btn"
                                           data-meal-id="{{ $meal->id }}">@lang('details.cart') <span></span></a>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                        <!--masonary end-->
                    </div>
                </div>
                <!--popular-dishes end-->
                <!--banner-text end-->
            </div>
        </section>
        @endif
        <!--main-banner end-->



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- jQuery -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <!-- Popper.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

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
                    if (title === "Your request has been accepted") {
                        Swal.fire(
                            '{{ __('alert.accepted') }}',
                            '{{ __('alert.accepted_message') }}',
                            'success'
                        )
                    }if(title === "The order is on the way"){
                        Swal.fire(
                            '{{ __('alert.delivering') }}',
                            '{{ __('alert.delivering_message') }}',
                            'success'
                        )
                    }
                    new Notification(title, {
                        body
                    });
                });
            });
        </script>

    @endsection
