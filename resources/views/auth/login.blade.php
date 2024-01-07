@extends('layouts.website.main')

@section('content')
    @php
        $langArabcicBool = App::getLocale() == 'ar' ? true : false;
    @endphp
    <div @if ($langArabcicBool) dir="rtl" @endif>
        <section class="pager-section text-center">
            <div class="overlay" style="z-index: 0"></div>
            <div class="fixed-bg bg4"></div>
            <div class="container">
                <div class="pager-head">
                    <h2 style="position: relative; z-index: 1;">@lang('login.log_in')</h2>
                </div>
                <!--pager-head end-->
            </div>
        </section>

        <section class="sec-block">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-5">
                        <div class="delitaste-form text-center ">
                            <div class="lg-text">
                                <h3>@lang('login.log_in_with')</h3>
                                <ul class="social">
                                    <li><a class="facebook" href="#" title=""><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a class="google" href="#" title=""><i class="fab fa-google"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!--lg-text end-->
                            <div class="or">
                                <span> @lang('login.or')</span>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group ">
                                    <input id="email" type="email" placeholder="@lang('login.email') "
                                        class="form-control @if ($langArabcicBool) text-right @endif @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">


                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <!--form-group end-->
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="@lang('login.password') "
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--form-group end-->
                                <div class="form-group">
                                    <button type="submit" class="btn-default w-100"> @lang('login.log_in')
                                        <span></span></button>
                                </div>
                            </form>
                            @php
                                $langArabcicBool = App::getLocale() == 'ar' ? true : false;
                            @endphp
                            <div @if ($langArabcicBool) dir="ltr" @endif>
                                <div class="btm-tx text-left">
                                    <span> @lang('login.no_account') <a href="{{ route('register') }}" title="">
                                            @lang('login.register_now')</a></span>
                                    <a href="{{ route('users.register-as-restaurant') }}" title="">
                                        @lang('login.register_resturant')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
