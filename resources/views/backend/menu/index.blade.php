@extends('layouts.dash')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Menu</h3>
                        <div class="float-right">
                            <a href="{{ route('dash.menu.create', ['param' => 'category_menu']) }}"
                                class="btn btn-warning btn-flat btn-sm" title="Tambah">Tambah Category Menu</a>
                            <a href="{{ route('dash.menu.create', ['param' => 'menu']) }}"
                                class="btn btn-primary btn-flat btn-sm" title="Tambah">Tambah Menu</a>
                            <a href="{{ route('dash.menu.create', ['param' => 'submenu']) }}"
                                class="btn btn-success btn-flat btn-sm" title="Tambah">Tambah Submenu</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive p-2 p-2">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category Menu Name</th>
                                        <th>Menu Name</th>
                                        <th>Sub Menu Name</th>
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
                //serverSide: true,
                processing: true,
                searchDelay: 1000,
                ajax: {
                    url: '{{ route('dash.menu.index') }}',
                },
                columns: [{
                        data: 'category_menu_name'
                    },
                    {
                        data: 'menu_name'
                    },
                    {
                        data: 'submenu_name'
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
