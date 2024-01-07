@extends('layouts.admin_panel.main')

@section('content')
    <div class="row mx-auto">
        <div class="col-md-12 col-lg-12 ">
            <div class="card mx-auto ">
                <div class="card-header border-bottom-0">
                    <h3 class="card-title">Messages</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap" style="text-align: center">
                        <thead class="bg-white">
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Message</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach ($messages as $key => $message)
                                <tr>
                                    <th>{{ ++$i }}</th>
                                    <td>{{ $message->user_name }}</td>
                                    <td>{{ $message->user_email }}</td>
                                    <td>{{\Carbon\Carbon::parse($message->created_at)->diffForHumans()}}</td>
                                    <td><textarea>{{ $message->message }}</textarea></td>
                                    <td>
                                        <a class="btn btn-danger" href="">Delete</a>
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
