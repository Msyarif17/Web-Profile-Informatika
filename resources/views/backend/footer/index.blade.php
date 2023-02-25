@extends('layouts.dash')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Footer</h3>
                        <div class="float-right">
                            <a href="{{ route('dash.footer.create') }}" class="btn btn-success btn-flat btn-sm"
                                title="Tambah">Tambah</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive" style="width:100%">
                            <table id="data" class="table  table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Url</th>
                                        <th>Parent ID</th>
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
                    url: '{{ route('dash.footer.index') }}',
                    type: "GET",
                    data: {
                        _token: "{{ csrf_token() }}"
                    }
                },
                columns: [
                    {
                        data: 'name',
                        name: 'name',
                        // search: [
                        //     value: $('.search').value
                        // ]
                    },
                    {
                        data: 'url',
                        name: 'url',
                    },
                    {
                        data: 'parent_id',
                        name: 'parent_id',
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
