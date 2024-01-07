@extends('layouts.website.main')
@push('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
@endpush
@section('content')

    <style>
        .form-control {
            background-color: white;
        }
    </style>
    @php
        $langArabcicBool = App::getLocale() == 'ar' ? true : false;
    @endphp
    <div @if ($langArabcicBool) dir="rtl" @endif>
        <section class="pager-section text-center">
            <div class="overlay" style="z-index: 0"></div>
            <div class="fixed-bg bg4"></div>
            <div class="container">
                <div class="pager-head">
                    <h2 style="position: relative;z-index: 1">@lang('location.newloc')</h2>
                </div>
            </div>
        </section>
        <section class="sec-block">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="delitaste-form text-center">
                            <div class="lg-text">
                                <h3>@lang('location.newloc') </h3>
                            </div>
                            <form method="POST" action="{{ route('add_location') }}" enctype="multipart/form-data">
                                @csrf
                                <div id="map" style="height: 300px; width: 750px;"></div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="projectinput1"> Location </label>
                                        <input type="text" id="pac-input" class="form-control"
                                               placeholder="Select a location..." name="location">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <input type="text" name="location_name" placeholder=" @lang('location.name') "
                                               class="form-control" required>
                                        @error('location_name')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="city" placeholder="@lang('location.city')  "
                                                   class="form-control" required>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="street" placeholder="@lang('location.street')  "
                                                   class="form-control" required>
                                            @error('street')
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
                                        <div class="form-group">
                                            <input type="text" name="build_number"
                                                   placeholder="@lang('location.build_number')  "
                                                   class="form-control" required>
                                            @error('build_number')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="floor" placeholder="@lang('location.floor')"
                                                   class="form-control" required>
                                            @error('floor')
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
                                            <textarea class="" name="description" id="description"
                                                      placeholder="@lang('accountrest.description')"
                                                      required></textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn-default w-100">@lang('location.create_loc')
                                            <span></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@push('js')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([34.7374, 36.7152], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker;

        function addMarker(location, title) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(location).addTo(map);
            if (title) {
                marker.bindPopup(title).openPopup();
                // Update the input field with the selected location's address
                $("#pac-input").val(title);
            }
        }

        // Click event listener on the map to select a location
        map.on('click', function(e) {
            var latlng = e.latlng;
            // Retrieve the name of the location using reverse geocoding
            $.getJSON('https://nominatim.openstreetmap.org/reverse', {
                lat: latlng.lat,
                lon: latlng.lng,
                format: 'json'
            }).done(function(data) {
                var title = data.display_name;
                addMarker(latlng, title);
            }).fail(function() {
                console.log('Error retrieving location name.');
            });
        });

        $("#pac-input").focusin(function () {
            $(this).val('');
        });
    </script>

@endpush
