@extends('layouts.admin_panel.main')
@section('header')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between align-items-center">
                <div class="float-left">
                    <h2>Show Role</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')




<div class="" style="padding: 3ch ; font-size: 2ch;">
    <div class="card">
        <div class="card-body">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Role Name:</strong>

                    {{ $role->name }}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Permissions:</strong>

                    @if(!empty($rolePermissions))

                        @foreach($rolePermissions as $v)

                            <label class="text text-success">{{ $v->name }},</label>

                        @endforeach

                    @endif

                </div>

            </div>
        </div>


    </div>

</div>

@endsection
