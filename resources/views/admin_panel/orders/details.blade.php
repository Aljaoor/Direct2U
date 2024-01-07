@extends('layouts.admin_panel.main')
@section('header')
    Order Details
@endsection
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> Order Meals</h5>
            <br>
            @foreach($order->meals as $meal)
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group row">
                            <label for="meal" class="col-sm-4 col-form-label font-weight-bold">Meal Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" disabled id="user_name"
                                       value="{{$meal->meal->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group row">
                            <label for="Restaurant" class="col-sm-4 col-form-label font-weight-bold">For Restaurant</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" disabled id="Restaurant"
                                       value="{{$meal->meal->restaurant->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group row">
                            <label for="Quantity" class="col-sm-4 col-form-label font-weight-bold">Quantity</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" disabled id="Quantity"
                                       value="{{$meal->quantity}}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <h5 class="card-title"> User Info</h5>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="user_name" class="col-sm-4 col-form-label font-weight-bold">User Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" disabled id="user_name"
                                   value="{{$order->user->name}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="user_mobile" class="col-sm-4 col-form-label font-weight-bold">User Mobile</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" disabled id="user_mobile"
                                   value="{{$order->user->mobile}}">
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="card-title"> Location Details</h5>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="street" class="col-sm-4 col-form-label font-weight-bold">Street</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" disabled id="street"
                                   value="{{$order->location->street}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="build_number" class="col-sm-4 col-form-label font-weight-bold">Building
                            Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" disabled id="build_number"
                                   value="{{$order->location->build_number}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="floor" class="col-sm-4 col-form-label font-weight-bold">Floor</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" disabled id="floor"
                                   value="{{$order->location->floor}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="description" class="col-sm-4 col-form-label font-weight-bold">Description</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" disabled id="description"
                                   value="{{$order->location->description}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="floor" class="col-sm-2 col-form-label font-weight-bold">Floor</label>
                        <div class="col-sm-10">
                            <div id="map" style="height: 200px; width: 1029px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group mx-auto">
            <br>
            @if($order->status === 'pending')
                <a type="submit" class="btn btn-success" href="{{route('orders.accept',$order->id)}}"> accept</a>
            @elseif($order->status === 'In preparation')
                <a type="submit" class="btn btn-primary" href="{{route('orders.start-delivery',$order->id)}}"> start delivery</a>
            @elseif($order->status === 'Delivery on the way')
                <a type="submit" class="btn btn-success" href="{{route('orders.done',$order->id)}}"> Done</a>
            @endif
        </div>
    </div>

    <script>
        var map = L.map('map').setView([24.740691, 46.6528521], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Retrieve the stored location name from the database (replace this with your logic)
        var storedLocationName = "{{$order->location->location}}";

        // Perform reverse geocoding using the location name
        $.getJSON('https://nominatim.openstreetmap.org/search', {
            q: storedLocationName,
            format: 'json',
            limit: 1
        }).done(function(data) {
            if (data.length > 0) {
                var latlng = [parseFloat(data[0].lat), parseFloat(data[0].lon)];
                var marker = L.marker(latlng).addTo(map);
                map.setView(latlng, 13);
                marker.bindPopup(storedLocationName).openPopup();
            }
        }).fail(function() {
            console.log('Error retrieving location coordinates.');
        });
    </script>
@endsection
