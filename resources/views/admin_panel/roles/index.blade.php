@extends('layouts.admin_panel.main')

@section('header')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="float-right">

            @can('role-create')

            <a class="btn btn-primary" href="{{ route('roles.create') }}"> Create New Role</a>

            @endcan

        </div>

    </div>

</div>
@endsection

@section('content')



@if ($message = Session::get('success'))

<div class="alert alert-success ">

    <p>{{ $message }}</p>

</div>

@endif



<!-- Row -->
<div class="row mx-auto">
    <div class="col-md-12 col-lg-12 ">
        <div class="card mx-auto ">
            <div class="card-header border-bottom-0">
                <h3 class="card-title">Role Management</h3>
            </div>
            <div class="table-responsive" >
                <table class="table card-table table-vcenter text-nowrap" style="text-align: center">
                    <thead class="bg-white ">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $role->name }}</td>
                            <td>

                                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>

                                @can('role-edit')

                                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>

                                @endcan

                                @can('role-delete')

                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                    {!! Form::close() !!}

                                @endcan

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
<!-- End Row -->


{!! $roles->render() !!}



@endsection
