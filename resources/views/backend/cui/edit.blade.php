@extends('layouts.dash')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
@endpush
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row justify-content-between fw-bold align-items-center">
                            <div class="card-title fs-1 ">
                                
                                Edit Theme
                                @if ($cui->isActive)
                                    <button type="button" class="btn btn-success">Active</button>
                                @else
                                    <button type="button" class="btn btn-danger">Inactive</button>
                                @endif
                            </div>
                            <a href="{{URL::previous()}}">
                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-arrow-left"></i> Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open(['route' => ['dash.cui.update',$cui->id], 'method' => 'put', 'autocomplete' => 'false','enctype'=>'multipart/form-data']) !!}
                        @include('backend.cui._form')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
@endpush