@extends('layouts.dashboard')
@push('css')
    
@endpush
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Webinar</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.manage-jadwal.store', 'method' => 'post', 'autocomplete' => 'false','enctype'=>'multipart/form-data']) !!}
                        @include('back-end.webinar._form')
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
