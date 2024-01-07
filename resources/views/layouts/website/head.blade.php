<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Direct2U</title>
<meta name="description" content="Delitaste - Food delivery and Restaurant HTML Template" />
<meta name="author" content="George_Fx">
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="{{ asset('website') }}/assets/images/logo.png">
<link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/css/all.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/css/animate.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/js/lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/js/lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/css/flaticon.css">
<link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/css/handelshow.css">

<link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/css/responsive.css">
{{--fixed button--}}
<link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/css/fixed-button.css">



{{-- status order --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/css/statusstyle.css"> --}}
{{-- status order --}}

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- home page css --}}
<link rel="stylesheet" type="text/css" href="{{ asset('website') }}/assets/css/home.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link
rel="stylesheet"
href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
/>
{{--  sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{--firebase--}}
@vite(['resources/sass/app.scss', 'resources/js/app.js'])


{{-- rtl bootstrap --}}
@if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
@endif

{{--application--}}
<meta name="theme-color" content="#6777ef"/>
<link rel="apple-touch-icon" href="{{ asset('website/assets/images/logo.png') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">
