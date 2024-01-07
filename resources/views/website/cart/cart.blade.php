@extends('layouts.website.main')
@section('content')
    @php
        $langArabcicBool = App::getLocale() == 'ar' ? true : false;
    @endphp


    <section class="pager-section text-center" style="height: 500px;display: flex;align-items: center">
        <div class="overlay" style="z-index: 0"></div>
        <div class="fixed-bg bg4"></div>
        <div class="container">
            <div class="pager-head">
                <h2 style="position: relative;z-index: 2;">@lang('cart.cart')</h2>
            </div>
            <!--pager-head end-->
        </div>
    </section>
    <!--pager-section end-->

    <section class="sec-block">
        <div class="container">
            <div class="cart-page">
                <div style="overflow: scroll">
                <table>
                    <thead>
                        <tr>
                            <th>image</th>
                            <th class="p-4">@lang('cart.Product')</th>
                            <th>@lang('cart.restaurants')</th>
                            <th class="p-4">@lang('cart.Quantity')</th>
                            <th class="p-4">@lang('cart.Price')</th>
                            <th>@lang('cart.Subtotal')</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        @forelse($meals as $meal)
                            <tr class="theorder" style="font-size: 13px;">
                                <td>
                                    <div class="cart-prod-info d-flex flex-wrap align-items-center">
                                        <img src="{{ asset($meal->image) }}" alt="">
                                    </div>
                                </td>
                                <td class="p-3">
                                    <div class="cart-pro-info">
                                        <h4><a href="#" title="" style="text-decoration: none;color: black">{{ $meal->name }}</a></h4>
                                    </div>
                                </td>
                                <td class="name" style="font-weight: bolder; ">{{ $meal->restaurant->name }}</td>
                                <td>
                                    <div class="item-counter">
                                        <div class="quantity" style="margin-right: 15px">
                                            <button class="plus-btn" type="button" name="button"
                                                data-meal-id="{{ $meal->id }}">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <input  type="number" name="quantity[]"
                                                value="{{ isset(session('cart')[$meal->id]) ? session('cart')[$meal->id] : '1' }}"
                                                data-meal-id="{{ $meal->id }}"/>
                                            <button class="minus-btn" type="button" name="button"
                                                data-meal-id="{{ $meal->id }}">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span  class="price" data-meal-id="{{ $meal->id }}">{{ $meal->price }} @lang('cart.SP')</span>
                                </td>
                                <td>
                                        <strong class="sub-total" style="width: 130px;" data-meal-id="{{ $meal->id }}">{{ $meal->price * session('cart')[$meal->id] }} @lang('cart.SP')</strong>
                                </td>
                                <td>
                                    <a href="#" class="removebtn" id="remove-btn" title="remove" data-meal-id="{{ $meal->id }}">
                                        <i class="fa fa-trash" style="color: red"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td rowspan="5" class="">
                                    <div class="cart-prod-info d-flex flex-wrap align-items-center">
                                        <div class="cart-pro-info">
                                            <h4><a href="#" title="">@lang('cart.There')</a></h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
                <div class="row justify-content-end">

                    <div class="col-lg-5 ">
                        <div class="price-table">
                            <ul>
                                <li>
                                    <h4>@lang('cart.Subtotal')</h4>
                                    <span class="price-table-subtotal" data-subtotal="{{$subTotal}}">{{$subTotal}} S.P</span>
                                </li>
                                <li>
                                    <h4 class="delivery">@lang('cart.Delivery')</h4>
                                    <span class="deliverytax">5000 S.P</span>
                                </li>
                                <li>
                                    <h4 class="total-price">@lang('cart.Total')</h4>
                                    <span class="total-price-after-deliverytax">{{$total}} S.P</span>
                                </li>
                            </ul>
                            <a class="btn-default text-center w-100"
                                href="{{ route('checkout.getCheckOut') }}">@lang('cart.Checkout')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
