@extends('frontend.component.master')
@section('css')
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
        
    </style>
@endsection
@section('content')
    <section class="container-fluid p-0" style="margin-top:60px;">
        <div id="carouselExampleIndicators" style="background-color: #7868E6;height: 500px;" class="carousel slide"
            data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="jumbotron p-0 mb-0 m"
                        style=" background-color: #7868E6;height: 500px;  background-image:url('{{ asset('assets/images/banner.png') }}') ; background-size: cover;background-repeat: no-repeat;background-position:center center; ">

                        <div class="py-0 h-100">
                            <div class="container d-flex py-0 h-100" style="">
                                <div class="row justify-content-center align-self-center">
                                    <div class="row m-0 p-0 ">
                                        <div class="col-12" style="color: white;">
                                            <b>
                                                <h1 style="font-size: 20px;font-weight:1000">Profil Jurusan</h1>
                                            </b>
                                            <b>
                                                <h1 style="font-size: 40px;font-weight:1000">Teknik Informatika</h1>
                                            </b>
                                        </div>
                                    </div>
                                    <div class="row m-0 p-0">
                                        <div class="col-12" style="color: white;">
                                            <p style="font-size: 20px;font-weight:1000">Informatika Sakti</p>
                                            <p style="font-size: 20px;font-weight:1000">Informatika Satu</p>
                                        </div>
                                    </div>
                                    <div class="row m-0 p-0">
                                        <div class="col-12">
                                            <a href=""><button class="btn btn-primary border-0"
                                                    style="background-color: #4F8A8B;">
                                                    <p class="p-0 m-0" style="font-weight:1000">Jelajahi Sekarang</p>
                                                </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron p-0 mb-0 m"
                        style=" background-color: #7868E6;height: 500px;  background-image:url('{{ asset('assets/images/banner.png') }}') ; background-size: cover;background-repeat: no-repeat;background-position:center center; ">

                        <div class="py-0 h-100">
                            <div class="container d-flex py-0 h-100" style="">
                                <div class="row justify-content-center align-self-center">
                                    <div class="row m-0 p-0 ">
                                        <div class="col-12" style="color: white;">
                                            <b>
                                                <h1 style="font-size: 20px;font-weight:1000">Profil Jurusan</h1>
                                            </b>
                                            <b>
                                                <h1 style="font-size: 40px;font-weight:1000">Teknik Informatika</h1>
                                            </b>
                                        </div>
                                    </div>
                                    <div class="row m-0 p-0">
                                        <div class="col-12" style="color: white;">
                                            <p style="font-size: 20px;font-weight:1000">Informatika Sakti</p>
                                            <p style="font-size: 20px;font-weight:1000">Informatika Satu</p>
                                        </div>
                                    </div>
                                    <div class="row m-0 p-0">
                                        <div class="col-12">
                                            <a href=""><button class="btn btn-primary border-0"
                                                    style="background-color: #4F8A8B;">
                                                    <p class="p-0 m-0" style="font-weight:1000">Jelajahi Sekarang</p>
                                                </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron p-0 mb-0 m"
                        style=" background-color: #7868E6;height: 500px;  background-image:url('{{ asset('assets/images/banner.png') }}') ; background-size: cover;background-repeat: no-repeat;background-position:center center; ">

                        <div class="py-0 h-100">
                            <div class="container d-flex py-0 h-100" style="">
                                <div class="row justify-content-center align-self-center">
                                    <div class="row m-0 p-0 ">
                                        <div class="col-12" style="color: white;">
                                            <b>
                                                <h1 style="font-size: 20px;font-weight:1000">Profil Jurusan</h1>
                                            </b>
                                            <b>
                                                <h1 style="font-size: 40px;font-weight:1000">Teknik Informatika</h1>
                                            </b>
                                        </div>
                                    </div>
                                    <div class="row m-0 p-0">
                                        <div class="col-12" style="color: white;">
                                            <p style="font-size: 20px;font-weight:1000">Informatika Sakti</p>
                                            <p style="font-size: 20px;font-weight:1000">Informatika Satu</p>
                                        </div>
                                    </div>
                                    <div class="row m-0 p-0">
                                        <div class="col-12">
                                            <a href=""><button class="btn btn-primary border-0"
                                                    style="background-color: #4F8A8B;">
                                                    <p class="p-0 m-0" style="font-weight:1000">Jelajahi Sekarang</p>
                                                </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev w-auto " type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next  w-auto" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="my-5 py-5">
                {{-- informasi terbaru --}}
                <div class="row justify-content-between mb-5">
                    <div class="col-6 font-size-24">
                        <div class="btn btn-primary border-0  ">
    
                            <p class="text-light fw-bold my-auto">Informasi terbaru</p>
    
                        </div>
                    </div>
                    <div class="col-6 font-size-16 align-self-center  text-end">
    
                        <a href="/" class="text-dark text-decoration-none d-inline-flex "><span class="align-middle">Informasi Lainnya </span ><img
                                    src="{{ asset('assets/images/Polygon 2.png') }}" alt="" sizes="14px"
                                    srcset=""></a>
                    </div>
                </div>
                <div class="row font-size-12">
                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <img src="{{ asset('assets/images/content 1.png') }}" alt="" class="card-img-top">
                            <div class="card-body" >
                                <div class="card-tittle fw-bold ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus,</div>
                                <div class="row p-0 m-0 justify-content-between py-1">
                                    <div class="col-6 p-0 m-0 text-start"><span class=""><i class="fa-solid fa-calendar"></i> 17 January 2023</span></div>
                                    <div class="col-6 p-0 m-0 text-end"><span class=""><i class="fa-solid fa-comment"></i> 0 Comment</span></div>
                                </div>
                                <div class="card-text font-size-10 ">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus, minus assumenda dolorem libero quas adipisci asperiores consequuntur hic repudiandae soluta laborum commodi repellendus veritatis incidunt ea.</p>
                                    
                                </div>
                                <div class="text-end">
                                    <a href="" class=" text-decoration-none">Baca selengkapnya <img src="{{ asset('assets/images/Vector.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <img src="{{ asset('assets/images/content 1.png') }}" alt="" class="card-img-top">
                            <div class="card-body" >
                                <div class="card-tittle fw-bold ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus,</div>
                                <div class="row p-0 m-0 justify-content-between py-1 font-size-10">
                                    <div class="col-6 p-0 m-0 text-start"><span class=""><i class="fa-solid fa-calendar"></i> 17 January 2023</span></div>
                                    <div class="col-6 p-0 m-0 text-end"><span class=""><i class="fa-solid fa-comment"></i> 0 Comment</span></div>
                                </div>
                                <div class="card-text font-size-10 ">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus, minus assumenda dolorem libero quas adipisci asperiores consequuntur hic repudiandae soluta laborum commodi repellendus veritatis incidunt ea.</p>
                                    
                                </div>
                                <div class="text-end">
                                    <a href="" class="text-decoration-none ">Baca selengkapnya <img src="{{ asset('assets/images/Vector.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <img src="{{ asset('assets/images/content 1.png') }}" alt="" class="card-img-top">
                            <div class="card-body" >
                                <div class="card-tittle fw-bold ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus,</div>
                                <div class="row p-0 m-0 justify-content-between py-1 font-size-10">
                                    <div class="col-6 p-0 m-0 text-start"><span class=""><i class="fa-solid fa-calendar"></i> 17 January 2023</span></div>
                                    <div class="col-6 p-0 m-0 text-end"><span class=""><i class="fa-solid fa-comment"></i> 0 Comment</span></div>
                                </div>
                                <div class="card-text font-size-10 ">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus, minus assumenda dolorem libero quas adipisci asperiores consequuntur hic repudiandae soluta laborum commodi repellendus veritatis incidunt ea.</p>
                                    
                                </div>
                                <div class="text-end">
                                    <a href="" class="text-decoration-none ">Baca selengkapnya <img src="{{ asset('assets/images/Vector.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- pengumuman --}}
                <div class="row justify-content-between my-5 pt-2">
                    <div class="col-6 font-size-24">
                        <div class="btn btn-primary border-0  ">
    
                            <p class="text-light fw-bold my-auto">Pengumuman</p>
    
                        </div>
                    </div>
                    <div class="col-6 font-size-16 align-self-center  text-end">
    
                        <a href="/" class="text-dark text-decoration-none d-inline-flex"><span  class="align-middle">Informasi Lainnya </span ><img
                                    src="{{ asset('assets/images/Polygon 2.png') }}" alt="" sizes="14px"
                                    srcset=""></a>
                    </div>
                </div>
                <div class="row font-size-12">
                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <img src="{{ asset('assets/images/content 1.png') }}" alt="" class="card-img-top">
                            <div class="card-body" >
                                <div class="card-tittle fw-bold ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus,</div>
                                <div class="row p-0 m-0 justify-content-between py-1">
                                    <div class="col-6 p-0 m-0 text-start"><span class=""><i class="fa-solid fa-calendar"></i> 17 January 2023</span></div>
                                    <div class="col-6 p-0 m-0 text-end"><span class=""><i class="fa-solid fa-comment"></i> 0 Comment</span></div>
                                </div>
                                <div class="card-text font-size-10 ">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus, minus assumenda dolorem libero quas adipisci asperiores consequuntur hic repudiandae soluta laborum commodi repellendus veritatis incidunt ea.</p>
                                    
                                </div>
                                <div class="text-end">
                                    <a href="" class=" text-decoration-none">Baca selengkapnya <img src="{{ asset('assets/images/Vector.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <img src="{{ asset('assets/images/content 1.png') }}" alt="" class="card-img-top">
                            <div class="card-body" >
                                <div class="card-tittle fw-bold ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus,</div>
                                <div class="row p-0 m-0 justify-content-between py-1 font-size-10">
                                    <div class="col-6 p-0 m-0 text-start"><span class=""><i class="fa-solid fa-calendar"></i> 17 January 2023</span></div>
                                    <div class="col-6 p-0 m-0 text-end"><span class=""><i class="fa-solid fa-comment"></i> 0 Comment</span></div>
                                </div>
                                <div class="card-text font-size-10 ">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus, minus assumenda dolorem libero quas adipisci asperiores consequuntur hic repudiandae soluta laborum commodi repellendus veritatis incidunt ea.</p>
                                    
                                </div>
                                <div class="text-end">
                                    <a href="" class="text-decoration-none ">Baca selengkapnya <img src="{{ asset('assets/images/Vector.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <img src="{{ asset('assets/images/content 1.png') }}" alt="" class="card-img-top">
                            <div class="card-body" >
                                <div class="card-tittle fw-bold ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus,</div>
                                <div class="row p-0 m-0 justify-content-between py-1 font-size-10">
                                    <div class="col-6 p-0 m-0 text-start"><span class=""><i class="fa-solid fa-calendar"></i> 17 January 2023</span></div>
                                    <div class="col-6 p-0 m-0 text-end"><span class=""><i class="fa-solid fa-comment"></i> 0 Comment</span></div>
                                </div>
                                <div class="card-text font-size-10 ">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum quisquam non necessitatibus, minus assumenda dolorem libero quas adipisci asperiores consequuntur hic repudiandae soluta laborum commodi repellendus veritatis incidunt ea.</p>
                                    
                                </div>
                                <div class="text-end">
                                    <a href="" class="text-decoration-none ">Baca selengkapnya <img src="{{ asset('assets/images/Vector.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="background-color:#4F8A8B;">
        <div class="container pb-3" >
            <div class="row my-3 pt-3">
                <div class="col-12 pt-3 font-size-24 fw-bold ">
                    Galeri Prestasi Dosen dan Mahasiswa
                </div>
            </div>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                    <img src="{{asset('assets/images/banner.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{asset('assets/images/banner.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{asset('assets/images/banner.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
        </div>
    </section>
    <section class="my-3">
        <div class="container">
            <div class="row justify-content-between my-5 pt-2">
                <div class="col-6 col-12 font-size-24">
                    <div class="btn btn-primary border-0  ">
    
                        <p class="text-light fw-bold my-auto">Peminat Prodi Teknik Informatika</p>
    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 font-size-18 fw-bold align-self-center">
                    <p>Peminat prodi teknik informatika UIN Sunan Gunung Djati Bandung selama satu dekade ditampilkan pada grafik di samping. Data ini diharapkan dapat membantu melengkapi penyusunan rencana pengembangan kegiatan pembelajaran di prodi Teknik Informatika UIN sunan Gunung Djati Bandung.</p>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container mb-5">
            <div class="row justify-content-between mb-3">
                    <div class="col-md-6 col-12 font-size-24">
                        <div class="btn btn-primary border-0  ">
    
                            <p class="text-light fw-bold my-auto">Kerjasama Industri</p>
    
                        </div>
                    </div>
                    
                </div>
            <div class="row justify-content-center">
                @for ($i=1;$i<=11;$i++)
                    <div class="col-lg-4 col-md-6 py-md-3 py-sm-3 align-self-center">
                        <div class="d-flex justify-content-center">
                            <img class="" src="{{asset('assets/images/'.$i.'.png')}}" alt="">
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection
@section('js')
    {{-- code --}}
@endsection
