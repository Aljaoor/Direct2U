@extends('layouts.admin_panel.main')

@section('header')

@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif
    <!-- Row -->
    <div class="row mx-auto">
        <div class="col-md-12 col-lg-12 ">
            <div class="card mx-auto ">
                <div class="card-header border-bottom-0">
                    <h3 class="card-title">Restaurants Requests</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap" style="text-align: center">
                        <thead class="bg-white">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>mobile</th>
                            <th>city</th>
                            <th width="280px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=0; @endphp
                        @foreach ($restuarants as $key => $res)
                            <tr>
                                <th>{{++$i}}</th>
                                <td>{{$res->name}}</td>
                                <td>{{$res->user->mobile}}</td>
                                <td>{{$res->city}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('restaurants.accept-request',$res->id) }}">accept</a>
                                    <a class="btn btn-info" href="{{ route('restaurants.get-request-details',$res->id) }}">details</a>
                                    <a class="btn btn-danger"
                                       href="{{ route('restaurants.delete',$res->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
