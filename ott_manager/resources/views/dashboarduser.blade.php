@extends('layouts.main')
@push('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endpush
@section('content')
<div class="col-md-12">
    <div class="d-flex align-items-center">
        <h1 class="font-30 font-w-700 text-blue mt-0 mb-0">Team Member</h1><br><br>
        <ul class="list list-inline ml-auto mb-0">
            <li class="list-inline-item">
                <a title="Upload Media" class="btn btn-blue mr-3 d-flex align-items-center justify-content-center w-100"
                    value="Add category" onclick="addDashboardUserModal();">
                    <i class="ti ti-plus mr-2"></i> Add New Team Member</a>
            </li>
        </ul>
    </div>
    <div class="card mt-4">
        <table class="table table-striped data-table">
        </table>
    </div>
</div>
@endsection
@push('script')
<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script type="text/javascript">
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('.data-table').DataTable({
        "scrollX": true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('dashboarduser') }}",
        columnDefs: [{
            targets: 5,
            title: 'Create Date',
            render: function(data, type, full, meta) {
                return moment(full['created_at']).format('DD/MM/YYYY hh:mm:ss');
            }
        }],
        columns: [{
                title: 'ID',
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                title: 'User Name',
                data: 'name',
                name: 'name'
            },
            {
                title: 'Email',
                data: 'email',
                name: 'email'
            },
            {
                title: 'Status',
                data: 'pstatus',
                name: 'pstatus'
            },
            {
                title: 'Rights',
                data: 'operation_permission',
                name: 'operation_permission'
            },
            {
                title: 'Create Date',
                data: 'created_at',
                name: 'created_at'
            },
            {
                title: 'Action',
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
});
</script>
@endpush