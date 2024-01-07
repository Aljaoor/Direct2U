<!doctype html>
<html lang="en">

<head>
    @include('layouts.website.head')
    @stack('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
@php
    $arabicBoolean = app()->getLocale();
@endphp
<body>
@include('sweetalert::alert')

<div class="page-loading">
    <img src="{{asset('website/assets/images/loader.gif')}}" alt=""/>
</div>

<div class="wrapper">

    @include('layouts.website.header')
    {{--  banner  --}}

    @yield('content')

    <footer>
        @include('layouts.website.footer')
    </footer><!--footer end-->

</div>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyDdW91znTQMTPpV-LbT50zTUWwTOjX7VHg",
        authDomain: "direct2u-d3914.firebaseapp.com",
        projectId: "direct2u-d3914",
        storageBucket: "direct2u-d3914.appspot.com",
        messagingSenderId: "804115700875",
        appId: "1:804115700875:web:94b26c45e122f7ef4a488e"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();


</script>
@stack('js')
<script>
    var alert_success = "{{ __('alert.added_successfully') }}";
    var alert_exists = "{{ __('alert.alert_exists') }}";
</script>

<script src="{{ asset("website/assets/js/starRating.js") }}"></script>
<script src="{{ asset("website/assets/js/cart.js") }}"></script>

<a class="fixed-button cart-ico" href="{{ route('checkout.get-card-page') }}" title="cart">
    <i class="fas fa-shopping-cart"></i>
    <span class="meals-count" id="fixed-button-num">{{ count(session('cart', [])) }}</span>
</a>
</body>

</html>
