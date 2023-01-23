@extends('layouts.dashboard')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Jadwal Webinar</h3>
                        <div class="float-right">
                            <a href="{{route('admin.manage-jadwal.create')}}" class="btn btn-success btn-flat btn-sm"
                               title="Tambah">Tambah</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Judul Webinar</th>
                                    <th>Narasumber</th>
                                    <th>Tanggal</th>
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
            $('#data').DataTable({
                serverSide: true,
                processing: true,
                searchDelay: 1000,
                ajax: {
                    url: '{{route('admin.manage-jadwal.index')}}',
                },
                columns: [
                    {data: 'judul'},
                    {
                        data: 'narasumber_name',name: 'narasumber.name',
                        orderable: false,
                        searchable: false
                    },
                    {data: 'jadwal'},
                    {
                        data: 'status', name: 'deleted_at', render: function (datum, type, row) {
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

                ]
            });
        });
    </script>
@endpush
