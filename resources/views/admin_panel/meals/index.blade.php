@extends('layouts.admin_panel.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif
<!-- Row -->
<div class="row mx-auto">
    <div class="col-md-12 col-lg-12 ">
        <div class="card mx-auto ">
            <div class="card-header border-bottom-0">
                <h3 class="card-title">Meals Management</h3>
            </div>
            <div class="table-responsive" >
                <table class="table card-table table-vcenter text-nowrap" style="text-align: center">
                    <thead class="bg-white">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Image</th>
                            @if(!auth()->user()->hasRole(['Restaurant']))
                                <th>Restaurant</th>
                            @endif
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $i=0; @endphp
                        @foreach ($meals as $meal)
                        <tr>
                            <th>{{++$i}}</th>
                            <td>{{$meal->name}}</td>
                            <td>{{$meal->price}}</td>
                            <td>{{$meal->category->name}}</td>
                            <td>
                                <img src="{{asset($meal->image)}}" width="80" height="80">
                            </td>
                            <td>{{$meal->restaurant->name}}</td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('meals.delete',$meal->id) }}">Delete</a>
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




@endsection
