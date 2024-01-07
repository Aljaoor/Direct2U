@extends('layouts.admin_panel.main')

@section('header')

@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif

    <!-- Row -->
    <div class="row mx-auto">
        <div class="col-md-12 col-lg-12">
            <div class="card mx-auto">
                <div class="card-header border-bottom-0">
                    <h3 class="card-title">User Management</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap" style="text-align: center">
                        <thead class="bg-white">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Role</th>
                            <th width="280px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($users as $key => $user)
                            <tr>
                                <th>{{++$i}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->mobile}}</td>
                                <td>{{$user->roles()->first()->name}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('users.delete',$user->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- table-responsive -->
            </div>
        </div>
    </div>



@endsection
