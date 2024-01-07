@extends('layouts.admin_panel.main')

@section('header')
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="float-left">

                <h2>Create New Role</h2>

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



    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mb-5">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permission:</strong>
                                <br/><br/>
                                <div class="row mb-5">
                                    @foreach($permission as $value)
                                        <div class="col-md-4" style="font-size: 2.5ch; margin: 2ch 0 0 0;">
                                            <label>
                                                {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                {{ $value->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center button-style">
                            <button type="submit" class="btn btn-primary button-style">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
