@extends('layouts.dash')
@push('css')
    @include('backend.component.tinymce-config')
@endpush
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row justify-content-between fw-bold align-items-center">
                            <div class="card-title fs-1 ">

                                Create {{ $param }}

                            </div>
                            <a href="{{ URL::previous() }}">
                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-arrow-left"></i> Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open([
                            'route' => ['dash.menu.store', 'param' => $param],
                            'method' => 'menu',
                            'autocomplete' => 'false',
                            'enctype' => 'multipart/form-data',
                        ]) !!}
                        @include('backend.menu._form')
                        {!! Form::close() !!}
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
        $("#page").on("change", function() {
            getname();
        });

        function getname() {
            $('#url').val("/page/" + $('#page').val());
        }
    </script>
@endpush
