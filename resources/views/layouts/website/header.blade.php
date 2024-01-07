<header>
    <div class="container-fluid">
        <div class="header-content d-flex flex-wrap align-items-center">
            <div class="logo">
                <a href="{{route('home')}}" title="">
                    <img src="{{ asset('website') }}/assets/images/logo.png" style="max-height: 20vh;">
                </a>
            </div>
            <!--logo end-->
            <nav>
                <ul>
                    <li><a class="active" href="{{ route('home') }}" title="">@lang('home.header.home')</a></li>
                    <li><a href="{{ route('restaurants.index') }}" title="">@lang('home.header.restaurants')</a>
                    <li><a href="{{ route('aboutUs') }}" title="">@lang('home.header.about_us')</a></li>
                    <li><a href="{{ route('contactus') }}" title="">@lang('home.header.contact_us')</a></li>
                    <li><a href="#" title="">{{ __('home.header.languages') }}</a>
                        <ul>
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>
            <!--navigation end-->
            <div class="menu-btn">
                <span class="bar1"></span>
                <span class="bar2"></span>
                <span class="bar3"></span>
            </div>
            <!--menu-bar end-->
            <ul class="oth-lnks ml-auto">
                <li><img src="{{ asset('website') }}/assets/images/icons/phone.svg" alt=""><a
                        href="tel:+963964444111" class="cart-ico fixHref">096 4444 111</a></li>
{{--                <li>--}}
{{--                    <a href="{{ route('checkout.get-card-page') }}" title="cart" class="cart-ico">--}}
{{--                        <img src="{{ asset('website') }}/assets/images/icons/cart.svg"></a>--}}
{{--                    <span id="cart-item-num" class="cart-item-num"--}}
{{--                        style=" font-size:1vw ; background-color: red; border-radius: 50%;">{{ count(session('cart', [])) }}</span>--}}
{{--                </li>--}}
                <li class="mr-5">
                    @if (auth()->user())
                        <a class=" cart-ico fixHref " href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            @lang('home.header.logout')
                            <img src="{{ asset('website/assets/images/icons/sign-in.svg') }}" alt="">
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" title="" class="cart-ico fixHref"> @lang('home.header.sign_in')
                            <img src="{{ asset('website') }}/assets/images/icons/sign-in.svg" alt="">
                        </a>
                    @endif
                </li>
            </ul>
            <!--oth-lnks end-->
        </div>
        <!--header-content end-->
        <div class="search-bar">
            <div class="container">
                <form>
                    <input type="text" name="search" placeholder="Search">
                </form>
            </div>
        </div>
        <!--search-bar end-->
    </div>
</header>
<!--header end-->

<div class="responsive-mobile-menu">
    <ul>
        <li><a class="active" href="{{ route('home') }}" title="">@lang('home.header.home')</a></li>
        <li><a href="{{ route('restaurants.index') }}" title="">@lang('home.header.restaurants')</a>
        <li><a href="{{ route('aboutUs') }}" title="">@lang('home.header.about_us')</a></li>
        <li><a href="{{ route('contactus') }}" title="">@lang('home.header.contact_us')</a></li>
        <li><a href="#" title="">{{ __('home.header.languages') }}</a>
            <ul>
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li>
            @if (auth()->user())
                <a class=" cart-ico fixHref " href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    @lang('home.header.logout')
                    <img src="{{ asset('website/assets/images/icons/sign-in.svg') }}" alt="">
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" title="" class="cart-ico fixHref"> @lang('home.header.sign_in')
                    <img src="{{ asset('website') }}/assets/images/icons/sign-in.svg" alt="">
                </a>
            @endif
        </li>
    </ul>
</div>
