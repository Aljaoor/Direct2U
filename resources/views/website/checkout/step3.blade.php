@extends('layouts.website.main')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/css/statusstyle.css">
    <section class="pager-section text-center" style="height: 500px;display: flex;align-items: center">
        <div class="overlay" style="z-index: 0"></div>
        <div class="fixed-bg bg4"></div>
        <div class="container">
            <div class="pager-head">
                <h2 style="position: relative;z-index: 2;">@lang('step3.Checkout')</h2>
            </div><!--pager-head end-->
        </div>
    </section><!--pager-section end-->

    <section class="sec-block" style="padding-top: 0px">
        <div class="container">
            {{-- status order --}}
             <div class="main">
            <div class="head">
                <p class="head_1">@lang('step3.Status')</p>
            </div>

            <ul class="status">
                <li class="line one actives">
                    <i class="icon uil uil-capture"></i>
                    <div class="progress">
                        <p style="margin-bottom: 0px">1</p>
                        <i class="uil uil-check"></i>
                    </div>
                    <p class="text">@lang('step3.Pennding')</p>
                </li>
                <li class="line two">
                    <i class="icon uil uil-clipboard-notes"></i>
                    <div class="progress">
                        <p style="margin-bottom: 0px">2</p>
                        <i class="uil uil-check"></i>
                    </div>
                    <p class="text">@lang('step3.Progress')</p>
                </li>
                <li class="line four">
                    <i class="icon uil uil-exchange"></i>
                    <div class="progress">
                        <p style="margin-bottom: 0px">3</p>
                        <i class="uil uil-check"></i>
                    </div>
                    <p class="text">@lang('step3.Your')</p>
                </li>
                <li class="line five">
                    <i class="icon uil uil-map-marker"></i>
                    <div class="progress">
                        <p style="margin-bottom: 0px">4</p>
                        <i class="uil uil-check"></i>
                    </div>
                    <p class="text">@lang('step3.Order')</p>
                </li>
            </ul>
        </div>
            {{-- status order end --}}
            <div class="success-para text-center">
                <img src="{{asset('website/assets/images/check-circle.png')}}">
                <h2>@lang('step3.Thank_you!')</h2>
                <p>@lang('step3.have')</p>
            </div><!--success-para end-->
            <div class="order-infoo">
                <div class="order-details">
                    <h3>@lang('step3.your_order')</h3>
                    <ul class="vl-ord">
                        @foreach($order->meals as $meal)
                            <li>
                                <div class="ppc">
                                    <span>{{$meal->meal->name}}</span>
                                    <b>{{$meal->quantity}}x</b>
                                </div>
                                <span>S.P {{$meal->price}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div><!--order-details end-->
                <div class="order-details">
                    <ul class="price-tablee">
                        <li>
                            <h4>@lang('step3.Subtotal')</h4>
                            <span>@lang('step3.SP') {{$order->price()}}</span>
                        </li>
                        <li>
                            <h4 class="delivery">@lang('step3.Delivery')</h4>
                            <span>@lang('step3.SP') 5000</span>
                        </li>
                        <li>
                            <h4 class="total-price">@lang('step3.Total')</h4>
                            <span class="total-price">@lang('step3.SP') {{$order->price()+5000}}</span>
                        </li>
                    </ul>
                </div><!--order-details end-->
            </div><!--order-infoo end-->

        </div>
    </section>
    {{-- <script src="{{ asset("website/assets/js/status.js") }}"></script> --}}

@endsection
@push('js')
    <script>
        const one = document.querySelector(".one");
        const two = document.querySelector(".two");
        const four = document.querySelector(".four");
        const five = document.querySelector(".five");
        // const title ="Your request has been accepted"
        messaging.onMessage(function ({data: {body, title}}) {
            if(title ==="Your request has been accepted"){
                  Swal.fire(
                    "{{ __('alert.accepted') }}",
                   "{{ __('alert.accepted_message') }}",
                  'success',
                 )
                 two.classList.add("actives");
                 four.classList.remove("actives");
                 five.classList.remove("actives");
            }
             if(title ==="The order is on the way"){
                  Swal.fire(
                    "{{ __('alert.delivering') }}",
                   "{{ __('alert.delivering_message') }}",
                  'success',
                 )
                     two.classList.add("actives");
                     four.classList.add("actives");
                     five.classList.remove("actives");
            }
            if(title ==="Done"){
                //   Swal.fire(
                //     "{{ ('alert.Done') }}",
                //    "{{ ('alert.accepted_message') }}",
                //   'success',
                //  )
                     two.classList.add("actives");
                     four.classList.add("actives");
                     five.classList.add("actives");
            }

            new Notification(title, {body});
        });
    </script>
@endpush
