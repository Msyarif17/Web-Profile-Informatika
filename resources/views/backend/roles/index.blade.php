@extends('layouts.dash')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Roles</h3>
                        <div class="float-right">
                            <a href="{{ route('dash.roles.create') }}" class="btn btn-success btn-flat btn-sm"
                                title="Tambah">Tambah</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Permission Name</th>
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
                    url: '{{ route('dash.roles.index') }}',
                },
                columns: [
                    {
                        data: 'name'
                    },
                    {
                        data: 'permission'
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
