@extends('frontend.component.master')

@section('content')

    
    <section>
        <div class="container pt-sm-3">
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="row">
                        
                        <div class="col-12 pb-3">
                            <figure>
                                {!! $content->content !!}
                            </figure>
                        </div>
                        @if (!Request::is('page*'))
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header"
                                        style="background-color:{{ $cui->navbar_color }};color:{{ $cui->navbar_text_color }}">
                                        <h3 class="card-title">Komentar Lainnya</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($comment as $c)
                                                <div class="col-12 pb-3">
                                                    <div class="row">
                                                        <div class="col-12 py-0 px-3">
                                                            <div class="d-flex ">
                                                                <div
                                                                    class="col-6 fw-bold text-capitalize align-self-center">
                                                                    <i
                                                                        class="fa-solid fa-user pe-3"></i>{{ $c->user->name }}
                                                                </div>
                                                                <div class="col-6 text-end align-self-center">

                                                                    <small class="">
                                                                        {{ Carbon\Carbon::parse($c->created_at)->format('l, d F Y, H:m A') }}
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 py-0 px-3">
                                                            <hr class="py-0 px-3">
                                                            <div class="d-flex justify-content-beetween">
                                                                <div class="col align-self-center">

                                                                    <p class=""><i
                                                                            class="fa-solid fa-message pe-3"></i>{{ $c->content }}
                                                                    </p>
                                                                </div>
                                                                @auth
                                                                @if (Auth::user()->id == $c->user->id)
                                                                    <div class="col align-self-center">
                                                                        <form
                                                                            action="{{ route('dash.comment.destroy', $content->id) }}"
                                                                            method="post" class="d-inline"
                                                                            onsubmit="return confirm('apakah anda yakin?')">
                                                                            @csrf
                                                                            <input type="hidden" name="_method"
                                                                                value="delete" />
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-flat btn-sm delete"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="delete"><span
                                                                                    class="fa fa-trash"></span></button>
                                                                        </form>
                                                                    </div>
                                                                @endif
                                                                @endauth
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="p-0">
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @auth
                                @can('comment')
                                    <div class="col-12 pb-3">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h3 class="card-title pb-3">Komentar</h3>
                                                {!! Form::open([
                                                    'route' => ['comment', $content->id],
                                                    'method' => 'post',
                                                    'autocomplete' => 'false',
                                                    'enctype' => 'multipart/form-data',
                                                ]) !!}
                                                <div class="row">

                                                    <div class="col-sm-12 col-md-12 pb-3">
                                                        <div class="form-group">
                                                            {!! Form::label('content', 'Komentar') !!}
                                                            <textarea class="form-control" id="richtext" name="content">{!! old('comment', @$categoryPost->description) !!}</textarea>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 pb-3">
                                                        <div class="form-group">
                                                            {!! Form::submit('Submit', ['class' => 'btn bg-light text-dark form-control btn-block', 'id' => 'save']) !!}
                                                        </div>
                                                    </div>


                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                            @endauth
                        @endif



                    </div>

                </div>
                
            </div>
        </div>
    </section>
@stop
