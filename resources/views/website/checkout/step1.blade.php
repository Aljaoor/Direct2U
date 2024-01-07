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
                    <h2 style="position: relative;z-index: 32;">@lang('checkout.Checkout')</h2>

                </div>
                <!--pager-head end-->
            </div>
        </section>
        <!--pager-section end-->
        <section class="sec-block">
            <div class="container">
                <div class="checkout-head @if ($langArabcicBool) text-right @endif">
                    @if ($langArabcicBool)
                        <ul>
                            <li>
                                <h2 class="active "><span class="pl-3">@lang('checkout.1')</span>@lang('checkout.Order_details')
                                </h2>
                            </li>
                            <li>
                                <h2 @if ($langArabcicBool) style="margin-left: 70px" @endif><span class="pl-3">@lang('checkout.2')</span>@lang('checkout.Payment_Method')</h2>
                            </li>
                            <li style="padding-right:140px;@if ($langArabcicBool) padding-right:0px @endif">
                                <h2><span class="pl-2">@lang('checkout.3')</span>@lang('checkout.Finish')</h2>
                            </li>
                        </ul>
                    @else
                        <ul>
                            <li>
                                <h2 class="active"><span class="pr-3">@lang('checkout.1')</span>@lang('checkout.Order_details')
                                </h2>
                            </li>
                            <li>
                                <h2><span class="pr-3">@lang('checkout.2')</span>@lang('checkout.Payment_Method')</h2>
                            </li>
                            <li>
                                <h2><span class="pr-3">@lang('checkout.3')</span>@lang('checkout.Finish')</h2>
                            </li>
                        </ul>
                    @endif
                </div>
                <!--checkout-head end-->
                <div class="mx-auto @if ($langArabcicBool) text-right @endif">
                    <a href="{{ route('checkout.get-card-page') }}" title="" class="btn-default2  "><i
                            class="fa fa-long-arrow-alt-left"></i>@lang('checkout.Back')</a>
                    <a href="{{ route('newLocation') }}" title="" class="btn-default2 pl-5"><i
                            class="fa fa-location-arrow "></i>@lang('checkout.add')</a>
                </div>
                <div class="form-group row pt-4 @if ($langArabcicBool) text-right @endif ">
                    <label for="location"
                        class="col-sm-3 col-form-label @if ($langArabcicBool) text-right @endif">@lang('checkout.Choose')</label>
                    <div class="col-sm-5 ">
                        <select class="form-control" required name="location_id" id="location"
                            onchange="location=this.value;"
                            >
                            @foreach ($locactions as $loc)
                                <option value="{{ route('checkout.showLocationById', $loc->id) }}"
                                    @if ($loc->active == true) selected @endif>{{ $loc->location_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 @if ($langArabcicBool) text-right @endif">
                        <form method="POST" action="{{route('checkout.step2')}}" class="checkout-form">
                            @csrf
                            <div class="ck-form @if ($langArabcicBool) text-right @endif">
                                <h5>@lang('checkout.Information')</h5>
                                <input type="hidden" name="location_id" value="{{ $location->id }}">
                                <div class="row pt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text"disabled name="name" value="{{ $user->name }}"
                                                class="form-control half-radius" placeholder="@lang('checkout.name')">
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" disabled name="phone" value="{{ $user->mobile }}"
                                                class="form-control half-radius @if ($langArabcicBool) text-right @endif"
                                                placeholder="@lang('checkout.number')">
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" disabled value="{{ $user->email }}" name="email"
                                                class="form-control half-radius @if ($langArabcicBool) text-right @endif"
                                                placeholder="@lang('checkout.email')">
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div>
                                    <h5>@lang('checkout.detales')</h5>
                                    <div>
                                        <div>
                                            <div class="form-group">
                                                <input type="text" disabled name="location_name"
                                                    value="{{ $location->location_name }}"
                                                    placeholder=" @lang('location.name') " class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" disabled name="city" value="{{ $location->city }}"
                                                    placeholder="@lang('location.city')  " class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" disabled name="street"
                                                    value="{{ $location->street }}" placeholder="@lang('location.street')  "
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" disabled name="build_number"
                                                    value="{{ $location->build_number }}"
                                                    placeholder="@lang('location.build_number')  " class="form-control">
                                            </div>
                                            <!--form-group end-->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" disabled name="floor"
                                                    value="{{ $location->floor }}" placeholder="@lang('location.floor')  "
                                                    class="form-control">
                                            </div>
                                            <!--form-group end-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ck-form @if ($langArabcicBool) text-right @endif">
                                <h4>@lang('checkout.info')</h4>
                                <div class="form-group @if ($langArabcicBool) text-right @endif ">
                                    <textarea name="order_note" placeholder="@lang('checkout.order')"></textarea>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn-default half-radius ">
                                @lang('checkout.method')</button>
                        </form>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="order-details " dir="ltr">
                            <h3 class=" @if ($langArabcicBool) text-right @endif">@lang('checkout.your_order')</h3>
                            <ul class="vl-ord">
                                @php $sumPrice = 0; @endphp
                                @foreach($meals as $meal)
                                    <li>
                                        <div class="ppc">
                                            <span>{{ $meal->name }}</span>
                                            <b>{{ session('cart')[$meal->id] }}x</b>
                                        </div>
                                        <span>{{ $meal->price * session('cart')[$meal->id] }} @lang('checkout.SP')</span>
                                    </li>
                                    @php $sumPrice += $meal->price * session('cart')[$meal->id] @endphp
                                @endforeach
                            </ul>
                            <ul class="price-tablee">
                                <li>
                                    <h4>@lang('checkout.Subtotal')</h4>
                                    <span> {{ $sumPrice }} @lang('checkout.SP')</span>
                                </li>
                                <li>
                                    <h4 class="delivery">@lang('checkout.Delivery')</h4>
                                    <span>5000 @lang('checkout.SP')</span>
                                </li>
                                <li>
                                    <h4 class="total-price">@lang('checkout.Total')</h4>
                                    <span class="total-price">{{ $sumPrice + 5000 }} @lang('checkout.SP')</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
