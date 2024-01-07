<!doctype html>
<html lang="en">

<head>
    @include('layouts.website.head')
</head>
@php
    $arabicBoolean = app()->getLocale();
@endphp
<body>

<div class="page-loading">
    <img src="{{asset('website')}}/assets/images/loader.gif" alt=""/>
</div><!--page-loading end-->

<div class="wrapper">

    @include('layouts.website.header')
    {{--  banner  --}}
   
    @yield('content')

    <footer>
        @include('layouts.website.footer')
    </footer><!--footer end-->

</div><!--wrapper end-->


</body>
</html>
