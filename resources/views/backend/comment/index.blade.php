@extends('layouts.dash')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Comment</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive" style="width:100%">
                            <table id="data" class="table  table-striped">
                                <thead>
                                    <tr>
                                        <th>Comment From</th>
                                        <th>Role</th>
                                        <th>Post</th>
                                        <th>Konten</th>
                                        <th>reply to messages from</th>
                                        <th>Tanggal Pembuatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@push('js')
    <script>
        $(function() {
            var table = $('#data').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                processing: true,
                ajax: {
                    url: '{{ route('dash.comment.index') }}',
                    type: "GET",
                    data: {
                        _token: "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        data: 'user.name',
                        name: 'user.name',
                        // search: [
                        //     value: $('.search').value
                        // ]
                    },
                    {
                        data: 'user.role.name',
                        name: 'user.role.name',
                    },
                    {
                        data: 'post.title',
                        name: 'post.title',
                    },
                    {
                        data: 'content',
                        name: 'content',
                    },
                    {
                        data: 'reply',
                        name: 'reply',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'status',
                        name: 'deleted_at',
                        render: function(datum, type, row) {
                            if (row.status == 'Active') {
                                return `<span class="badge badge-success">${row.status}<span>`;
                            } else {
                                return `<span class="badge badge-danger">${row.status}<span>`;
                            }

                        }
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },

                ],
                search: {
                    "regex": true
                },
            });
            table.buttons().container()
                .appendTo('#data .col-md-6:eq(0)');
        });
    </script>
@endpush
