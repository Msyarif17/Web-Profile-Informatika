@extends('frontend.component.master')
@section('css')
    {{-- code --}}
@endsection
@section('content')
    <section class="container pt-5">
        <div class="row">
            <div class="card shadow p-0 h-100 ">
                <img src="{{ asset('storage' . $banner->thumbnail) }}" alt="" class="card-img-top img-fluid"
                    style="max-height:520px;object-fit: cover;object-position: center;">
                <div class="card-body">
                    <div class="card-title fw-bold ">
                        <h1 class="text-capitalize">

                            {{ Str::limit($banner->title, 100, '...')  }}
                        </h1>
                    </div>
                    {{-- <div class="row p-0 m-0 justify-content-between py-1">
                        <div class="col-6 p-0 m-0 text-start"><span class=""><i
                                    class="fa-solid fa-calendar"></i>{{ Carbon\Carbon::parse($banner->created_at)->format('l, d F Y, H:m A') }}</span>
                        </div>
                        <div class="col-6 p-0 m-0 text-end"><span class=""><i class="fa-solid fa-comment"></i> 0
                                Comment</span></div>
                    </div> --}}
                    <div class="card-text ">
                        <p>{{ Str::limit(strip_tags($banner->content), 100, '...') }}</p>

                    </div>
                    <div class="text-end">
                        <a href="{{ route('post.detail', $banner->slug) }}" class="text-decoration-none ">Baca
                            selengkapnya <img src="{{ asset('assets/images/Vector.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container py-5">
        <div class="row">
            <div class="col-md-6 col-sm-12 pb-3">
                <div class="card shadow ">
                    <div class="d-flex">
                        <div class="col-6" style="background-color: {{ $cui->card_color }}">
                            <div class="d-flex h-100">
                                <div class="col align-self-center  fw-bold text-center text-align-center text-capitalize "
                                    style="color:{{ $cui->card_text_color }};">

                                    Kategori

                                </div>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="dropdown w-100">
                                <button class="btn w-100 h-100 dropdown-toggle rounded-0 border-0"
                                    style="background-color:white" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Pilih Kategori
                                </button>

                                <ul class="dropdown-menu w-100 text-center">
                                    @foreach ($category as $c)
                                        <li><a class="dropdown-item" href="{{route('post.manager',$c->slug)}}">{{ $c->name }}({{$c->post->count()}})</a></li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card shadow">
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
                                   @foreach ($arsip as $year=>$a)
                                        <li><a class="dropdown-item" href="{{route('post.manager',['arsip','year'=>$year])}}">{{ $year }} ({{$a}})</a></li>
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
                @foreach ($posts as $key =>$post)
                @if (($key + 1) % 2 == 1)
                <div class="col-12">
                    <a href="{{ route('post.detail', $post->slug) }}" class="text-decoration-none ">
                        <div class="card shadow mb-3 ">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="{{ asset('storage' . $post->thumbnail) }}" class="img-fluid "
                                        style="height:360px;object-fit: cover;object-position: center;"
                                        alt="{{ $post->title }}">
                                </div>
                                <div class="col-md-6" style="background-color:{{$cui->card_color}}">
                                    <div class="card-body overflow-auto" style="max-height:360px;background-color:rgba(255, 255, 255, 0)">
                                        <div class="card-tittle fw-bold ">
                                            <h3>{{ $post->title }}</h3>
                                        </div>
                                        <div class="row p-0 m-0 justify-content-between py-1">
                                            <div class="col-6 p-0 m-0 text-start"><span class=""><i
                                                        class="fa-solid fa-calendar"></i>{{ Carbon\Carbon::parse($post->created_at)->format('l, d F Y, H:m A') }}</span>
                                            </div>
                                            <div class="col-6 p-0 m-0 text-end"><span class=""><i
                                                        class="fa-solid fa-comment"></i>
                                                    0 Comment</span></div>
                                        </div>
                                        <div class="card-text ">
                                            <p>{{ Str::limit(strip_tags($post->content), 100, '...') }}</p>

                                        </div>
                                        <div class="text-end ">
                                            Baca
                                            selengkapnya <img src="{{ asset('assets/images/Vector.png') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @else
                <div class="col-12">
                    <a href="{{ route('post.detail', $post->slug) }}" class="text-decoration-none ">
                        <div class="card shadow mb-3" style="">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="{{ asset('storage' . $post->thumbnail) }}" class="img-fluid "
                                        style="height:360px;object-fit: cover;object-position: center;"
                                        alt="{{ $post->title }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body" style="max-height:360px;background-color: white ;color:black">
                                        <div class="card-tittle fw-bold ">
                                            <h3>{{ $post->title }}</h3>
                                        </div>
                                        <div class="row p-0 m-0 justify-content-between py-1">
                                            <div class="col-6 p-0 m-0 text-start"><span class=""><i
                                                        class="fa-solid fa-calendar"></i>{{ Carbon\Carbon::parse($post->created_at)->format('l, d F Y, H:m A') }}</span>
                                            </div>
                                            <div class="col-6 p-0 m-0 text-end"><span class=""><i
                                                        class="fa-solid fa-comment"></i>
                                                    0 Comment</span></div>
                                        </div>
                                        <div class="card-text ">
                                            <p>{{ Str::limit(strip_tags($post->content), 100, '...') }}</p>

                                        </div>
                                        <div class="text-end ">
                                            Baca
                                            selengkapnya <img src="{{ asset('assets/images/Vector.png') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                @endif
                
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    {{-- code --}}
@endsection
