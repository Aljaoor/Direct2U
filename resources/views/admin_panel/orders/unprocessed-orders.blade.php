@extends('layouts.admin_panel.main')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif
    <!-- Row -->
    <div class="row mx-auto">
        <div class="col-md-12 col-lg-12">
            <div class="card mx-auto ">
                <div class="card-header border-bottom-0">
                    <h3 class="card-title">Undelivered Orders</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped card-table table-vcenter text-nowrap m-3"  id="order-table"
                           style="text-align: center">
                        <thead class="bg-white ">
                        <tr>
                            <th>No</th>
                            <th>User Name</th>
                            <th>User Mobile</th>
                            <th>Location Street</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Total Price</th>
                            <th width="280px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(function () {

                var table = $('#order-table').DataTable({
                    processing: true,
                    serverSide: true,
                    paging: false,
                    searching: false,
                    ajax: "{{ route('orders.data') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'user name', name: 'user name'},
                        {data: 'user mobile', name: 'user mobile'},
                        {data: 'location street', name: 'location street'},
                        {data: 'payment_type', name: 'payment type'},
                        {data: 'status', name: 'status'},
                        {data: 'price', name: 'total price'},
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ]
                });

                messaging.onMessage(function ({data: {body, title}}) {
                    table.draw();
                    new Notification(title, {body});
                });

            });
        </script>
    @endpush

@endsection
