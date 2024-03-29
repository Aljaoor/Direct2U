@extends('layouts.admin_panel.main')
@section('header')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="float-left">

            <h2>Edit Role</h2>

        </div>

        <div class="float-right">

            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>

        </div>

    </div>

</div>
@endsection

@section('content')





@if (count($errors) > 0)

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif



{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

<div class="card m-3">
    <div class="card-body p-4">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Permission:</strong>

                    <br /><br />
                    <div class="row">
                        @foreach($permission as $value)

                            <div class="col-md-3" style="font-size: 2.5ch; margin: 2ch 0 0 0ch;">
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true :
                        false, array('class' => 'name')) }}

                                    {{ $value->name }}</label>
                            </div>

                        @endforeach
                    </div>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary button-style">Update</button>

            </div>

        </div>

    </div>

</div>


{!! Form::close() !!}



@endsection
