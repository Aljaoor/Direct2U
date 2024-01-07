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
                    <h2 style="position: relative; z-index: 1;">@lang('register.sign_up')</h2>
                </div>
                <!--pager-head end-->
            </div>
        </section>

        <section class="sec-block">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="delitaste-form text-center">
                            <div class="lg-text">
                                <h3>@lang('register.sign_up_with')</h3>
                                <ul class="social">
                                    <li><a class="facebook" href="#" title=""><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a class="google" href="#" title=""><i class="fab fa-google"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="or" style="display: flex;">
                                <hr style="width: 387px;">
                                <span style="display: flex;align-items: center;justify-content: center;">@lang('register.or')</span>
                                <hr style="width: 387px;">
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="@lang('register.your_name')"
                                                class="form-control">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="mobile"
                                                placeholder="@lang('register.mobile_number') @lang('register.number')" class="form-control">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="@lang('register.email') "
                                                class="form-control @if ($langArabcicBool) text-right @endif">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="@lang('register.password') "
                                                class="form-control">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="confirm-password" placeholder="@lang('register.confirm_password') "
                                                class="form-control">
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn-default w-100"> @lang('register.create_account')
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @php
                            $langArabcicBool = App::getLocale() == 'ar' ? true : false;
                        @endphp
                        <div @if ($langArabcicBool) dir="ltr" @endif>
                            <div class="btm-tx text-left log-in ">
                                <span> @lang('register.already_account') <a href="{{ route('login') }}" title="">
                                        @lang('register.log_in')</a></span>
                                <a href="{{ route('users.register-as-restaurant') }}" title=""> @lang('login.register_resturant')</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
