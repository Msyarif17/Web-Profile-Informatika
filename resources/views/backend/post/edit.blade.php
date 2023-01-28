@extends('layouts.dashboard')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row justify-content-between fw-bold align-items-center">
                            <div class="card-title fs-1 ">
                                
                                    Edit Post
                                
                            </div>
                            <a href="{{route('dash.back')}}">
                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-arrow-left"></i> Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open(['route' => ['dash.post.update',$webinar->id], 'method' => 'put', 'autocomplete' => 'false','enctype'=>'multipart/form-data']) !!}
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
