@extends('layouts.admin_panel.main')
@section('header')
    Create New User
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="name" id="name"
                                placeholder="Inter Your Name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" required name="email" id="staticEmail"
                                placeholder="Onter Restaurants Email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" required name="password"
                                placeholder="Password">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                `
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" required name="mobile" id="mobile"
                                placeholder="Inter Your Phone">
                            @error('mobile')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select name="role" required class="form-control" id="role">
                                <option value="">choose role</option>
                                @foreach ($roles as $role)
                                    @if ($role->name == 'Restaurant')
                                        @continue
                                    @endif
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group text-center">
                        <br><br>
                        <button type="submit" class="btn btn-primary button-style"> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
