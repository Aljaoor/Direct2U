@extends('layouts.website.mainlogin')
@section('content')
    @php
        $langArabcicBool = App::getLocale() == 'ar' ? true : false;
    @endphp
    <div @if ($langArabcicBool) dir="rtl" @endif>
        <section class="pager-section text-center" style="height: 500px">
            <div class="overlay" style="z-index: 0"></div>
            <div class="fixed-bg bg4"></div>
            <div class="container">
                <div class="pager-head">
                    <h2 style="position: relative;z-index: 2;">@lang('accountrest.register_resturant')</h2>
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
                                <h3>@lang('accountrest.register_resturant') </h3>
                            </div>
                            <!--lg-text end-->
                            <form method="POST" action="{{ route('restaurants.register-as-restaurant') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group text-left">
                                            <label  class="pb-2 @if ($langArabcicBool) pr-4 @else pl-4 @endif"@if ($langArabcicBool) style="display: flex" @endif for="title" for="description"
                                                    class="col-sm-2 col-form-label"> @lang('accountrest.user_name')</label>
                                            <input type="text" name="user_name"
                                                class="form-control">
                                            @error('user_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-left">
                                             <label  class="pb-2 @if ($langArabcicBool) pr-4 @else pl-4 @endif" @if ($langArabcicBool) style="display: flex" @endif for="title" for="description"
                                                    class="col-sm-2 col-form-label">@lang('accountrest.name_res')</label>
                                            <input type="text" name="name"
                                                class="form-control">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group text-left">
                                             <label  class="pb-2 @if ($langArabcicBool) pr-4 @else pl-4 @endif" @if ($langArabcicBool) style="display: flex" @endif for="title" for="description"
                                                    class="col-sm-2 col-form-label">@lang('accountrest.email')</label>
                                            <input type="email" name="email"
                                                class="form-control @if ($langArabcicBool) text-right @endif">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-left">
                                            <label  class="pb-2 @if ($langArabcicBool) pr-4 @else pl-4 @endif" @if ($langArabcicBool) style="display: flex" @endif for="title" for="description"
                                                    class="col-sm-2 col-form-label">@lang('accountrest.mobile_phone') </label>
                                            <input type="text" name="mobile"
                                                class="form-control">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group text-left">
                                            <label  class="pb-2 @if ($langArabcicBool) pr-4 @else pl-4 @endif" @if ($langArabcicBool) style="display: flex" @endif for="title" for="description"
                                                    class="col-sm-2 col-form-label">@lang('accountrest.password') </label>
                                            <input type="password" name="password"
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
                                        <div class="form-group text-left">
                                            <label  class="pb-2 @if ($langArabcicBool) pr-4 @else pl-4 @endif" @if ($langArabcicBool) style="display: flex" @endif for="title" for="description"
                                                    class="col-sm-2 col-form-label">@lang('accountrest.confirm_password') </label>
                                            <input type="password" name="confirm-password"
                                                 class="form-control">
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div style="position: relative;">
                                                <button class="btn-default w-100" type="button"
                                                    style="position: absolute; top: 0; left:0; height: 100%; width: 100%;"
                                                    onclick="document.getElementById('file-input').click();">
                                                    <h6>@lang('accountrest.Choose_Image')</h6>
                                                </button>
                                                <input type="file" id="file-input" name="image" placeholder="Image"
                                                    class="form-control">
                                            </div>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="city" required class="form-control" id="city"
                                                style="height: 0.62in">
                                                <option value="">@lang('accountrest.choose_city')</option>
                                                <option value="homs">@lang('accountrest.homs')</option>
                                                <option value="hama">@lang('accountrest.hama')</option>
                                                <option value="aleppo">@lang('accountrest.aleppo')</option>
                                                <option value="damascus">@lang('accountrest.damascus')</option>
                                                <option value="daraa">@lang('accountrest.daraa')</option>
                                                <option value="latakia">@lang('accountrest.latakia')</option>
                                                <option value="tartous">@lang('accountrest.tartous')</option>
                                            </select>
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                </div>
                                <div class="row ">
                                    @foreach (config('translatable.locales') as $locale)
                                        <div class="col-md-6">
                                            <div class="form-group  @if ($langArabcicBool) text-right  @else text-left @endif    ">
                                                <label  class="pb-2    @if ($langArabcicBool) pr-4 @else pl-4 @endif" for="title"
                                                    class="col-sm-2 col-form-label ">@lang('accountrest.title') @if ($locale == 'en')
                                                        @lang('accountrest.langen')
                                                    @else
                                                        @lang('accountrest.langar')
                                                    @endif </label>
                                                <input type="text" required class="form-control"
                                                    name="{{ $locale }}[title]" id="title">
                                                @error($locale . '.title')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row @if ($langArabcicBool) text-right  @else text-left @endif ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  class=" pb-2 @if ($langArabcicBool) pr-4 @else pl-4 @endif" for="title" for="title"
                                                class="col-sm-2 col-form-label"> @lang('accountrest.open_time') </label>
                                            <input type="time" name="open_time"class="form-control ">
                                            @error('open_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  class="pb-2 @if ($langArabcicBool) pr-4 @else pl-4 @endif" for="title" for="title"
                                                class="col-sm-2 col-form-label">@lang('accountrest.close_time') </label>
                                            <input type="time" name="close_time" class="form-control">
                                            @error('close_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--form-group end-->
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach (config('translatable.locales') as $locale)
                                        <div class="col-md-6">
                                            <div class="form-group @if ($langArabcicBool) text-right  @else text-left @endif ">
                                                <label  class="pb-2 @if ($langArabcicBool) pr-4 @else pl-4 @endif" for="title" for="description"
                                                    class="col-sm-2 col-form-label">@lang('accountrest.description') @if ($locale == 'en')
                                                        @lang('accountrest.langen')
                                                    @else
                                                        @lang('accountrest.langar')
                                                    @endif </label>
                                                <textarea required class="form-control" name="{{ $locale }}[description]" id="description"></textarea>
                                                @error($locale . '.description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn-default w-100">@lang('accountrest.create_res')
                                            <span></span></button>
                                    </div>
                                </div>
                            </form>
                            <div class="btm-tx">
                                <span class="d-block">@lang('accountrest.already_account')
                                    <a href="{{ route('login') }}" title=""> @lang('accountrest.log_in') </a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
