@extends('frontend.component.master')

@section('content')

    @include('frontend.component.banner')
    <section>
        <div class="container pt-0">
            <div class="row pt-3">
                <hr class=" px-0 pb-0">
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12 ">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-capitalize" style="font-weight:1000">
                                {{ $content->title }}
                            </h1>
                        </div>
                        <hr class="my-3">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <span class="text-secondary">
                                        <i class="fa-solid fa-calendar"></i>
                                        {{ Carbon\Carbon::parse($content->created_at)->format('l, d F Y, H:m A') }}
                                    </span>
                                </div>
                                @if ($content->posted_by)
                                    <div class="">
                                        <span class="text-secondary"><i class="fa-solid fa-user"></i>
                                            {{ $content->user->name }}
                                        </span>
                                    </div>
                                @endif
                                @if (!Request::is('page*'))
                                    <div class=""><span class="text-secondary"><i class="fa-solid fa-comment"></i>
                                            {{ $content->comment->count() }} Comment</span></div>
                                @endif
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="col-12 pb-3">
                            {!! $content->content !!}
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
                <div class="col-md-4 col-sm-12 pe-0">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <div class="align-self-center">
                                            <div class="text-capitalize">
                                                Informasi Terbaru
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-12 pb-3">
                                <div class="card">
                                    <img src="{{ asset($post->thumbnail ? 'storage' . $post->thumbnail : $post->thumbnail) }}"
                                        alt="" class="card-img-top img-fluid"
                                        style="height:152px;object-fit: cover;object-position: center;">
                                    <div class="card-body">
                                        <div class="card-tittle fw-bold ">
                                            <small>
                                                {{ Str::limit(strip_tags($post->title), 100, '...') }}
                                            </small>
                                        </div>
                                        <div class="row p-0 m-0 justify-content-between py-1">
                                            <div class="col-6 p-0 m-0 text-start"><small class=""><i
                                                        class="fa-solid fa-calendar"></i>{{ Carbon\Carbon::parse($post->created_at)->format('l, d F Y') }}</small>
                                            </div>
                                            <div class="col-6 p-0 m-0 text-end"><small class=""><i
                                                        class="fa-solid fa-comment"></i> {{ $post->comment->count() }}
                                                    Comment</small></div>
                                        </div>
                                        <div class="card-text ">
                                            <p>{{ Str::limit(strip_tags($post->content), 50, '...') }}</p>

                                        </div>
                                        <div class="text-end">
                                            <a href="{{ route('post.detail', $post->slug) }}"
                                                class="text-decoration-none ">Baca selengkapnya <img
                                                    src="{{ asset('assets/images/Vector.png') }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endForeach
                    </div>
                    <div class="row mb-5">
                        <div class="col-12 font-size-16 align-self-center  text-end">

                            <a href="{{ route('post.manager', 'berita') }}"
                                class="text-dark text-decoration-none d-inline-flex "><span class="align-middle">Informasi
                                    Lainnya </span><img src="{{ asset('assets/images/Polygon 2.png') }}" alt=""
                                    sizes="14px" srcset=""></a>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12 col-sm-12 mb-3">
                            <div class="row">
                                <div class="col-12 my-3">
                                    <div class="d-flex justify-content-center">

                                        <div class="col align-self-center  fw-bold text-center text-align-center text-capitalize p-3 rounded"
                                            style="color:{{ $cui->card_text_color }};background-color: {{ $cui->card_color }}">

                                            Kategori

                                        </div>

                                    </div>
                                    <div class="col-12 my-3 p-0">
                                        <div class="dropdown w-100">
                                            <button class="btn w-100 h-100 dropdown-toggle rounded shadow border"
                                                style="background-color:white" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Pilih Kategori
                                            </button>

                                            <ul class="dropdown-menu w-100 text-center">
                                                @foreach ($category as $c)
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('post.manager', $c->slug) }}">{{ $c->name }}({{ $c->post->count() }})</a>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="d-flex">
                                <div class="col-12 my-3">
                                    <div class="d-flex justify-content-center">

                                        <div class="col align-self-center  fw-bold text-center text-align-center text-capitalize p-3 rounded"
                                            style="color:{{ $cui->card_text_color }};background-color: {{ $cui->card_color }}">
                                            Arsip

                                        </div>

                                    </div>
                                    <div class="col-12 my-3 p-0">
                                        <div class="dropdown w-100">
                                            <button class="btn w-100 h-100 dropdown-toggle rounded shadow border"
                                                style="background-color:white" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Pilih Arsip
                                            </button>

                                            <ul class="dropdown-menu w-100 text-center">
                                                @foreach ($arsip as $year => $a)
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('post.manager', ['arsip', 'year' => $year]) }}">{{ $year }}
                                                            ({{ $a }})
                                                        </a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
