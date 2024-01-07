@extends('layouts.website.main')
@section('content')
    @php
        $langArabcicBool = App::getLocale() == 'ar' ? true : false;
    @endphp
    <div @if ($langArabcicBool) dir="rtl" @endif>
        <section class="pager-section text-center" style="height: 500px;display: flex;align-items: center">
            <div class="overlay" style="z-index: 0"></div>
            <div class="fixed-bg bg4"></div>
            <div class="container">
                <div class="pager-head">
                    <h2 style="position: relative;z-index: 2;">@lang('about_us.about_us')</h2>
                </div>
                <!--pager-head end-->
            </div>
        </section>
        <!--pager-section end-->
        <section class="sec-block">
            <div class="container">
                <div class="about-us-sec">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="about-content @if ($langArabcicBool) text-right @endif">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="abt-img">
                                            <img src="{{ asset("website/assets/images/11.jpg") }}" alt="" class="w-100">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="abt-img">
                                            <img src="{{ asset("website/assets/images/88.jpg") }}" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                                <h4>@lang('about_us.t2')</h4>
                                <p>@lang('about_us.t5')</p>
                            </div>
                            <!--about-content end-->
                        </div>
                        <div class="col-md-4">
                            <div class="our-proptz v2 text-center">
                                <div class="proptz">
                                    <div class="propt-icon">
                                        <img src="{{ asset('website') }}/assets/images/icons/discount.svg" alt="">
                                    </div>
                                    <h3 class="semi-bold text-capitalize">@lang('about_us.system')</h3>
                                    <p>@lang('about_us.t1')</p>
                                </div>
                                <div class="proptz">
                                    <div class="propt-icon">
                                        <img src="{{ asset('website') }}/assets/images/icons/delivery.svg" alt="">
                                    </div>
                                    <h3 class="semi-bold text-capitalize">@lang('about_us.Delivery')</h3>
                                    <p>@lang('about_us.t3')</p>
                                </div>
                                <div class="proptz">
                                    <div class="propt-icon">
                                        <img src="{{ asset('website') }}/assets/images/icons/food.svg" alt="">
                                    </div>
                                    <h3 class="semi-bold text-capitalize">@lang('about_us.lot')</h3>
                                    <p>@lang('about_us.t4')</p>
                                </div>
                            </div>
                            <!--our-proptz end-->
                        </div>
                    </div>
                </div>
                <!--about-us-sec end-->
            </div>
        </section>

        <section class="sec-block oder-sec">
            <div class="fixed-bg bg2"></div>
            <div class="container">
                <div class="order-appliction">
                    <h2>@lang('about_us.t6')<span>@lang('about_us.t7')</span></h2>
                    <ul class="vl-fzt">
                        <li>
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="transparent"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22 11.0799V11.9999C21.9988 14.1563 21.3005 16.2545 20.0093 17.9817C18.7182 19.7088 16.9033 20.9723 14.8354 21.5838C12.7674 22.1952 10.5573 22.1218 8.53447 21.3744C6.51168 20.6271 4.78465 19.246 3.61096 17.4369C2.43727 15.6279 1.87979 13.4879 2.02168 11.3362C2.16356 9.18443 2.99721 7.13619 4.39828 5.49694C5.79935 3.85768 7.69278 2.71525 9.79619 2.24001C11.8996 1.76477 14.1003 1.9822 16.07 2.85986"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M22 4L12 14.01L9 11.01" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            <div class=" vs-info ; @if ($langArabcicBool) text-right @endif ">
                                <h4>@lang('about_us.t8')</h4>
                                <p>@lang('about_us.t9')</p>
                            </div>
                        </li>
                        <li>
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="transparent"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22 11.0799V11.9999C21.9988 14.1563 21.3005 16.2545 20.0093 17.9817C18.7182 19.7088 16.9033 20.9723 14.8354 21.5838C12.7674 22.1952 10.5573 22.1218 8.53447 21.3744C6.51168 20.6271 4.78465 19.246 3.61096 17.4369C2.43727 15.6279 1.87979 13.4879 2.02168 11.3362C2.16356 9.18443 2.99721 7.13619 4.39828 5.49694C5.79935 3.85768 7.69278 2.71525 9.79619 2.24001C11.8996 1.76477 14.1003 1.9822 16.07 2.85986"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M22 4L12 14.01L9 11.01" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            <div class="vs-info @if ($langArabcicBool) text-right @endif">
                                <h4>@lang('about_us.t10')</h4>
                                <p>@lang('about_us.t11')</p>
                            </div>
                        </li>
                    </ul>
                    <ul class="btnss">
                        <li><img src="{{ asset('website') }}/assets/images/btn1.png" alt=""></li>
                        <li><img src="{{ asset('website') }}/assets/images/btn2.png" alt=""></li>
                    </ul>
                </div>
                <!--promotion end-->
            </div>

        </section>
        <br><br>
        <section>
            <div class="section-title text-center @if ($langArabcicBool) text-right @endif">
                <br><br>
                <h2 class="text-capitalize">@lang('about_us.t12')</h2>
                <p class="mx-auto">@lang('about_us.t13')</p>
                {{-- <span>The reason why </span> --}}
            </div>
            <!--sec-title end-->
        </section>

        <section class="services-section">
            <div class="container">
                <div class="services-sec">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="service @if ($langArabcicBool) text-right @endif">
                                <h2 class="semi-bold">01.</h2>
                                <span class="text-uppercase"><img src="assets/images/icons/location.svg"
                                                                  alt="">@lang('about_us.t14')</span>
                                <h4 class="semi-bold text-capitalize"><a href="#"
                                                                         title="">@lang('about_us.t15')</a></h4>
                                <p>@lang('about_us.t16') </p>
                            </div>
                            <!--service end-->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="service @if ($langArabcicBool) text-right @endif">
                                <h2 class="semi-bold">02.</h2>
                                <span class="text-uppercase"><img src="assets/images/icons/meat.svg"
                                                                  alt="">@lang('about_us.t17')</span>
                                <h4 class="semi-bold text-capitalize"><a href="#"
                                                                         title="">@lang('about_us.t18')</a>
                                </h4>
                                <p>@lang('about_us.t19')</p>
                            </div>
                            <!--service end-->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="service @if ($langArabcicBool) text-right @endif">
                                <h2 class="semi-bold">03.</h2>
                                <span class="text-uppercase"><img src="assets/images/icons/box.svg"
                                                                  alt="">@lang('about_us.t20')</span>
                                <h4 class="semi-bold text-capitalize"><a href="#"
                                                                         title="">@lang('about_us.t21')</a></h4>
                                <p>@lang('about_us.t22')</p>
                            </div>
                            <!--service end-->
                        </div>
                    </div>
                </div>
                <!--services end-->
            </div>
        </section>
        <!--services section end-->
        <br><br>
    </div>
@endsection
