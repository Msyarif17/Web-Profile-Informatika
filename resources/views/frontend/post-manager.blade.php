@extends('frontend.component.master')
@section('css')
    {{-- code --}}
@endsection
@section('content')
    <section class="container ">
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route('post.detail', $banner->slug) }}" class="text-decoration-none ">
                    <div class="card rounded-0"
                        style="height:420px;
                    background-image:url('{{ asset('storage' . $banner->thumbnail) }}') ; 
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position:center center;">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-center"
                                style="height:100%; background: rgb(0,0,0);
                            background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(255,255,255,0) 50%);">
                                <div class="col-12 align-self-end p-3">

                                    <div class="card-tittle fw-bold ">
                                        <h3>
                                            {{ Str::limit($banner->title, 50, '...') }}
                                        </h3>
                                        <span class=""><i
                                                class="fa-solid fa-calendar"></i>{{ Carbon\Carbon::parse($banner->created_at)->format('l, d F Y, H:m A') }}</span>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="container py-5">
        <div class="row">
            <div class="col-md-6 col-sm-12 pb-3">
                <div class="card">
                    <div class="d-flex ">
                        <div class="col-6 rounded-start-3" style="background-color: {{ $cui->card_color }}">
                            <div class="d-flex h-100">
                                <div class="col align-self-center  fw-bold text-center text-align-center text-capitalize "
                                    style="color:{{ $cui->card_text_color }};">

                                    Kategori

                                </div>
                            </div>
                        </div>
                        <div class="col-6 rounded-end-3 p-0">
                            <div class="dropdown w-100">
                                <button class="btn w-100 h-100 dropdown-toggle  rounded-0 border-0"
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
            <div class="col-md-6 col-sm-12">
                <div class="card  rounded-3 ">
                    <div class="d-flex">
                        <div class="col-6" style="background-color: {{ $cui->card_color }}">
                            <div class="d-flex h-100">
                                <div class="col align-self-center  fw-bold text-center text-align-center text-capitalize "
                                    style="color:{{ $cui->card_text_color }};">

                                    Arsip

                                </div>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="dropdown w-100">
                                <button class="btn w-100 h-100 dropdown-toggle rounded-0 border-0"
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
    </section>
    <section>
        <div class="container">
            <div class="row">
                @foreach ($posts as $key => $post)
                <div class="col-md-4 pb-3">
                    <a href="{{ route('post.detail', $post->slug) }}" class="text-decoration-none ">
                        <div class="card rounded-0"
                            style="height:350px;
                        background-image:url('{{ asset('storage' . $post->thumbnail) }}') ; 
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position:center center;">
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-center"
                                    style="height:100%; background: rgb(0,0,0);
                                background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(255,255,255,0) 50%);">
                                    <div class="col-12 align-self-end p-3">

                                        <div class="card-tittle fw-bold ">
                                            <h3>
                                                {{ Str::limit($post->title, 50, '...') }}
                                            </h3>
                                            <span class=""><i
                                                    class="fa-solid fa-calendar"></i>{{ Carbon\Carbon::parse($post->created_at)->format('l, d F Y, H:m A') }}</span>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    {{-- code --}}
@endsection
