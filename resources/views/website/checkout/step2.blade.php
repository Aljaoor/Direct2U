@extends('layouts.website.main')
@section('content')
    @php
        $arabicBool = App::getLocale() == 'ar' ? true : false;
    @endphp
<div @if ($arabicBool) dir="rtl" @endif>
    <section class="pager-section text-center" style="height: 500px;display: flex;align-items: center">
        <div class="overlay" style="z-index: 0"></div>
        <div class="fixed-bg bg4"></div>
        <div class="container">
            <div class="pager-head">
                <h2 style="position: relative;z-index: 2;">@lang('step2.Checkout')</h2>

            </div>
        </div>
    </section>

    <section class="sec-block">
        <div class="container">
           <div class="checkout-head @if ($arabicBool) text-right @endif">
                    @if ($arabicBool)
                        <ul>
                            <li>
                                <h2 class="active "><span class="pl-3">@lang('checkout.1')</span>@lang('checkout.Order_details')
                                </h2>
                            </li>
                            <li>
                                <h2 @if ($arabicBool) style="margin-left: 70px" @endif><span class="pl-3">@lang('checkout.2')</span>@lang('checkout.Payment_Method')</h2>
                            </li>
                            <li style="padding-right:140px;@if ($arabicBool) padding-right:0px @endif">
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
                </div><!--checkout-head end-->
            <a href="{{route('checkout.getCheckOut')}}" title="" style="margin-bottom: 20px" class="btn-default2"><i class="fa fa-long-arrow-alt-left"></i>@lang('step2.Back')</a>
            <div class="row mt-40">
                <div class="col-lg-8">
                    <form class="checkout-form mt-0" action="{{route('checkout.confirm')}}" method="POST">
                        @csrf
                        <div class="payment-optionz">
                            <div class="other-pay-optz">
                                <h4><input type="radio" name="payment_type" value="1" class="circle-box mr-4" required><a>@lang('step2.Cach')</a></h4>
                            </div>
                            <div class="other-pay-optz">
                                <h4><input type="radio" name="payment_type" value="2" class="circle-box mr-4" required><a>@lang('step2.Syriatel_Cach ')</a></h4>
                            </div>
                            <div class="other-pay-optz">
                                <h4><input type="radio" name="payment_type" value="3" class="circle-box mr-4" required><a>@lang('step2.MTN_Cach')</a></h4>
                            </div>
                        </div>
                        <button class="btn-default" type="submit">@lang('step2.Confirm_Order') <span></span></button>
                    </form>
                </div>
                <div class="col-lg-4 ">
                    <div class="order-details " dir="ltr">
                        <h3 class=" @if ($arabicBool) text-right @endif">@lang('checkout.your_order')</h3>
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
