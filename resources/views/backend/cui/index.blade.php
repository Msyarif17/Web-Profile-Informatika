@extends('layouts.dash')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Theme</h3>
                        <div class="float-right">
                            <a href="{{ route('dash.cui.create') }}" class="btn btn-success btn-flat btn-sm"
                                title="Tambah">Tambah</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">

                        <div class="table-responsive p-2 p-2">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
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
            <div class="col-sm-12 col-md-12">
                <div class="card  p-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-start ">
                            <h5 class="fw-bold">Preview webiste</h5>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ route('index') }}" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
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
                //serverSide: true,
                processing: true,
                searchDelay: 1000,
                ajax: {
                    url: '{{ route('dash.cui.index') }}',
                },
                columns: [{
                        data: 'name'
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

                ]
            });
        });
    </script>
@endpush
