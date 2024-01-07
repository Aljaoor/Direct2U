@extends('layouts.website.main')
@section('content')
    @php
        $langArabcicBool = App::getLocale() == 'ar' ? true : false;
    @endphp
    <div @if ($langArabcicBool) dir="rtl" @endif>
        <style>
            .rating .fa-star.selected,
            .rating .fa-star.selected ~ .fa-star {
                color: gold;
            }
        </style>
        <section class="pager-section text-center" style="height: 500px">
            <div class="overlay" style="z-index: 0"></div>

                <div class="fixed-bg "
                     style=" background-attachment: fixed; background-image:url({{ asset('website/assets/images/1.jpg')}})">
                </div>
        </section>
        <section class="sec-block res-padding">
            <div class="container">
                <div class="restaurant-details">
                    <div class="pager-head">
                        <h2>{{ $restuarant->name }}</h2>
                    </div>
                    <div class="food-thumbail-large">
                        <img src="{{ asset($restuarant->image) }}" alt="" class="w-100"/>
                    </div>
                    @php
                    $langArabcicBool = App::getLocale() == 'ar' ? true : false;
                @endphp
                <div @if ($langArabcicBool) dir="ltr" @endif>
                    <div class="food-info">
                        <ul class="meta">
                            <div class="time">
                            <li>
                                <img src="assets/images/icons/calendar.svg" alt=""/>
                                <span>@lang('details.Monday') - @lang('details.Sunday')</span>
                            </li>
                            <li>
                                <img src="assets/images/icons/clock.svg" alt=""/>
                                <span> @lang('details.AM') {{ $restuarant->open_time }} - @lang('details.PM')
                                    {{ $restuarant->close_time }}</span>
                            </li>
                            </div>
                            <li>
                                <span>{{ $restuarant->reviews->count() }} @lang('details.Reviews')</span>
                                <ul class="rating">
                                    <li><i class=" @if ($restuarant->rate() >= 1) fa @else far @endif fa-star"></i>
                                    </li>
                                    <li><i class=" @if ($restuarant->rate() >= 2) fa @else far @endif fa-star"></i>
                                    </li>
                                    <li><i class=" @if ($restuarant->rate() >= 3) fa @else far @endif fa-star"></i>
                                    </li>
                                    <li><i class=" @if ($restuarant->rate() >= 4) fa @else far @endif fa-star"></i>
                                    </li>
                                    <li><i class=" @if ($restuarant->rate() >= 5) fa @else far @endif fa-star"></i>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h4>
                            {{ $restuarant->title }}
                        </h4>
                        <p>
                            {{ $restuarant->description }}
                        </p>
                    </div>
                </div>
            </div>
                <!--restaurant-details end-->
            </div>
        </section>
        <section class="sec-block menu-padding">
            <div class="container">
                <div class="section-title text-center">
                    <span>@lang('details.Amazing_taste')</span>
                    <h2 class="text-capitalize">@lang('details.Menu')</h2>
                </div>
                <!--sec-title end-->
                <div class="popular-dishes style2 text-center">
                    <div class="options">
                        <div class="option-isotop">
                            <ul id="filter" class="option-set filters-nav" data-option-key="filter">
                                <li>
                                    <a class="selected" data-option-value=".meat">@lang('details.all')</a>
                                </li>
                                @foreach ($restuarant->categories as $category)
                                    <li>
                                        <a data-option-value=".{{ $category->id }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--options end-->
                    <div class="row">
                        <div class="masonary handel-show" style="padding: 0px">
                            @foreach ($restuarant->meals as $meal)
                                <div class="col-lg-4 col-md-4 col-sm-6 meat {{ $meal->category_id }}" style="padding: 0px 15px 0px 0px">
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
                        </div>
                        <!--masonary end-->
                    </div>
                </div>
                <!--popular-dishes end-->
            </div>
        </section>
        <section class="sec-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="feedback-section  @if ($langArabcicBool) text-right @endif">
                            <h2>@lang('details.Feedbacks') ({{count($restuarant->reviews)}})</h2>
                            <div class="testimonials-list">
                                @foreach ($restuarant->reviews as $review)
                                    <div class="test-monial">
                                        <div class="testi_head">
                                            <ul>
                                                <li>
                                                    <img src="https://via.placeholder.com/65x65" alt=""/>
                                                    <span>{{ $review->name }}</span>
                                                </li>
                                                <li>{{ $review->date }}</li>
                                                <li>
                                                    <ul class="rating">
                                                        <li><i
                                                                class=" @if ($review->rate >= 1) fa @else far @endif fa-star"></i>
                                                        </li>
                                                        <li><i
                                                                class=" @if ($review->rate >= 2) fa @else far @endif fa-star"></i>
                                                        </li>
                                                        <li><i
                                                                class=" @if ($review->rate >= 3) fa @else far @endif fa-star"></i>
                                                        </li>
                                                        <li><i
                                                                class=" @if ($review->rate >= 4) fa @else far @endif fa-star"></i>
                                                        </li>
                                                        <li><i
                                                                class=" @if ($review->rate >= 5) fa @else far @endif fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <p>
                                            {{ $review->review }}
                                        </p>
                                    </div>
                                    <!--test-monial end-->
                                @endforeach
                            </div>
                        </div>
                        <!--feedback section end-->
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar ">
                            <div class="widget widget-review ">
                                <h3 class="widget-title  @if ($langArabcicBool) text-right @endif ">
                                    @lang('details.Leave')</h3>
                                <form method="POST" action="{{ route('restaurants.store-review') }}">
                                    @csrf
                                    <input type="text" name="name" placeholder="@lang('details.name')"
                                           class="half-radius name"/>
                                    <input class=" @if ($langArabcicBool) text-right @endif" type="email"
                                           name="email" placeholder="@lang('details.email')" class="half-radius email"/>
                                    <textarea name="review" class="comment"
                                              placeholder="@lang('details.Write')"></textarea>
                                    <div class="rating d-block">
                                        <i class="rating__star far fa-star" value="1"></i>
                                        <i class="rating__star far fa-star" value="2"></i>
                                        <i class="rating__star far fa-star" value="3"></i>
                                        <i class="rating__star far fa-star" value="4"></i>
                                        <i class="rating__star far fa-star" value="5"></i>
                                    </div>
                                    <input type="hidden" name="restaurant_id" value="{{ $restuarant->id }}">
                                    <input type="hidden" name="rate" id="starrating">
                                    <div class="text-center">
                                        <button type="submit" class="btn-default half-radius addComment">
                                            @lang('details.Submit') <span></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!--widget-review end-->
                        </div>
                        <!--sidebar end-->
                    </div>
                </div>
            </div>
        </section>
    </div>
        @push('js')
            <script>
                function initFirebaseMessagingRegistration() {
                    messaging.requestPermission().then(function () {
                        return messaging.getToken()
                    }).then(function (token) {

                        axios.post("{{ route('fcmToken') }}", {
                            _method: "PATCH",
                            token
                        }).then(({data}) => {
                            console.log(data)
                        }).catch(({response: {data}}) => {
                            console.error(data)
                        })

                    }).catch(function (err) {
                        console.log(`Token Error :: ${err}`);
                    });
                }

                initFirebaseMessagingRegistration();
                messaging.onMessage(function ({data: {body, title}}) {
                    Swal.fire(
                        'Accepted',
                        'Your request has been accepted',
                        'success'
                    )
                    new Notification(title, {body});
                });
            </script>
        @endpush
@endsection
