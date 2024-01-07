@extends('layouts.website.main')
@section('content')
<section class="pager-section text-center">
    <div class="fixed-bg bg4"></div>
    <div class="container">
        <div class="pager-head">
            <h2>404</h2>
        </div>
    </div>
</section>

<section class="sec-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="error-page text-center">
                    <h2>404</h2>
                    <h3>@lang('home.404')</h3>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
