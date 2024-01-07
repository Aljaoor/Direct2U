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
                    <h2 style="position: relative;z-index: 2;"> @lang('contact_us.Contact_Us')</h2>

                </div>
                <!--pager-head end-->
            </div>
        </section>
        <!--pager-section end-->

        <section class="sec-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-us-section pr-100">
                            <div class="section-title   @if ($langArabcicBool) text-right @endif  ">
                                <span>@lang('contact_us.Touch') </span>
                                <h2 class="text-capitalize">@lang('contact_us.t1')</h2>
                                <p class="mx-auto mw-100">@lang('contact_us.t2')</p>
                            </div>
                            <!--sec-title end-->
                            <form id="contact-form" method="post" action="{{ route('send_message') }}">
                                @csrf
                                <div class="response"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="user_name" disabled value="{{$user->name}}" class="form-control name half-radius"
                                                placeholder="@lang('contact_us.t9')">
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <input type="user_email" disabled name="email" value="{{$user->email}}"
                                                class="form-control email half-radius @if ($langArabcicBool) text-right @endif "
                                                placeholder="@lang('contact_us.t5')">
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="message" placeholder="@lang('contact_us.t10')" required></textarea>
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-sm-12  @if ($langArabcicBool) text-right @endif">
                                        <button type="submit" id="submit" class="btn-default">@lang('contact_us.t11')
                                            <span></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--contact-us-section end-->
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="widget contact-widget">
                                <div class="numb @if ($langArabcicBool) text-right @endif">
                                    <h5>@lang('contact_us.t3')</h5>
                                    <p>@lang('contact_us.t4')</p>
                                </div>
                                <div class="numb @if ($langArabcicBool) text-right @endif">
                                    <h5>@lang('contact_us.t5')</h5>
                                    <p>@lang('contact_us.t6')</p>
                                </div>
                                <div class="numb @if ($langArabcicBool) text-right @endif">
                                    <h5>@lang('contact_us.t7')</h5>
                                    <p>@lang('contact_us.t8')</p>
                                </div>
                            </div>
                            <!--contact-widget end-->
                        </div>
                        <!--sidebar end-->
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('js')
        <script>
            var loading = "{{ __('alert.loading') }}";
            var image = "{{ asset('website/assets/images/preloader.gif') }}";
        </script>
    @endpush
@endsection
