@extends('frontend.component.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/owlcarousel/assets/owl.theme.default.min.css') }}">
    <style>
        .hideme {
            opacity: 0;
        }
    </style>
@endsection
@section('content')
    @include('frontend.component.carousel')
    <section class="hideme">
        <div class="container py-5 mt-3 pt-3">
            <div class="row  pt-5">
                <div class="col-xl-6 col-md-7 col-12 ">
                    <div class="d-flex pb-4  " style="color:black;">
                        <div class="col align-self-center">
                            <div class="d-block justify-content-center">
                                {{-- <div style="margin-right: 4px;">
                                    <img class="" src="{{ asset('storage' . $cui->logo) }}" alt="Teknik Informatika"
                                        height="100px" width="100px">
                                </div>
                                <span class="font-size-24 align-self-center">
                                    <h2 style="font-weight:1000">{!! $cui->logo_name !!}</h2>
                                </span> --}}
                                <h3 class="fw-bold">
                                    Kuliah di Teknik Informatika<br>
                                    Universitas Islam Negeri <br>
                                    Sunan Gunung Djati Bandung
                                </h3>
                                <p class="">
                                    Program Studi/Jurusan Teknik Informatika UIN Sunan Gunung Djati hadir sebagai garda
                                    terdepan dalam pengembangan potensi insani yang unggul, kompetitif, dan berakhlak
                                    karimah.

                                    Profil lulusan Program Studi/Jurusan Teknik Informatika ditetapkan berdasarkan kajian
                                    keilmuan yang merepresentasikan perkembangan keilmuan bidang Informatika di masa yang
                                    akan datang serta hasil analisa penelusuran alumni yang merupakan cerminan kebutuhan
                                    industri.
                                </p>
                                <div class="col-12 p-3 py-4 my-5 bg-secondary text-light text-center">
                                    <h5 class="fw-bold mb-3">
                                        Sudah punya pilihan? Ayo Join Sekarang
                                    </h5>
                                    <a href="https://pmb.uinsgd.ac.id/" class="btn rounded-0 btn-warning w-100">
                                        PMB UIN Sunan
                                        Gunung Djati Bandung
                                    </a>

                                </div>
                                <p class="mt-2">
                                    <span class="fw-bold">#ExplorasiPotensiTeknologimu</span> bersama Teknik Informatika UIN
                                    Sunan Gunung Djati Bandung!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6  d-none d-md-block">
                    <div class="ratio ratio-1x1 overflow-hidden" style="border-radius:0 0 0 100px ">
                        <img src="{{ asset('assets/images/ss-profil-lulusan-1.png') }}" alt=""
                            style="object-fit: cover;">
                        {{-- <iframe src="{{ $cui->video_thumbnail }}" title="Video Player" frameborder="0"
                            allow="autoplay"></iframe> --}}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="hideme">
        <div class="container pt-2">

            <div class="owl-carousel owl-theme owl-loaded owl-drag" id="owl-1">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 1s ease 1s;">
                        <div class="owl-item active">
                            <div class="item">
                                <div class="mx-3 text-start">

                                    <h4 class="fw-bold">
                                        Riset Berbasis Kelompok Keahlian
                                    </h4>
                                    <p>
                                        Jurusan Teknik Informatika mengarahkan riset mahasiswa dan dosen sesuai dengan
                                        Kelompok Keahlian
                                    </p>
                                    <a href="#">

                                        <button class="btn bg-warning rounded-0 w-100 text-start text-light">Program
                                            Study</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item active">
                            <div class="item">
                                <div class="mx-3 text-start">


                                    <h4 class="fw-bold">
                                        Networking Training Center
                                    </h4>
                                    <p>
                                        Networking Training Center adalah salah satu program unggulan Jurusan Teknik
                                        informatika dalam meningkatkan softskill dan hardskill mahasiswa
                                    </p>
                                    <a href="#">

                                        <button class="btn bg-warning rounded-0 w-100 text-start text-light">Program
                                            Study</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item active">
                            <div class="item">
                                <div class="mx-3 text-start">


                                    <h4 class="fw-bold">
                                        Kurikulum Berbasis Outcome-base Education (OBE)
                                    </h4>
                                    <p>
                                        Outcome-base Education (OBE) diimplementasikan sebagai salah satu langkah strategis
                                        Jurusan Teknik Informatika
                                    </p>
                                    <a href="#">

                                        <button class="btn bg-warning rounded-0 w-100 text-start text-light">Program
                                            Study</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item active">
                            <div class="item">
                                <div class="mx-3 text-start">


                                    <h4 class="fw-bold">
                                        IF Podcast
                                    </h4>
                                    <p>
                                        Salah satu program Jurusan Teknik Informatika dalam rangka meningkatkan atensi
                                        mahasiswa dan dosen untuk belajar tidak terbatas ruang dan waktu
                                    </p>
                                    <a href="#">

                                        <button class="btn bg-warning rounded-0 w-100 text-start text-light">Program
                                            Study</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item active">
                            <div class="item">
                                <div class="mx-3 text-start">


                                    <h4 class="fw-bold">
                                        Layanan Digital
                                    </h4>
                                    <p>
                                        Jurusan Teknik Informatika melakukan digitalisasi layanan akademik secara bertahap
                                        untuk mewujudkan pelayanan prima kepada stakeholder
                                    </p>
                                    <a href="#">

                                        <button class="btn bg-warning rounded-0 w-100 text-start text-light">Program
                                            Study</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item active">
                            <div class="item">
                                <div class="mx-3 text-start">


                                    <h4 class="fw-bold">
                                        "Smart Village" PkM Desa Binaan
                                    </h4>
                                    <p>
                                        "Smart Village" adalah salah satu program Jurusan Teknik Informatika yang dituangkan
                                        dalam bentuk Pengabdian Kepada Masyarakat
                                    </p>
                                    <a href="#">

                                        <button class="btn bg-warning rounded-0 w-100 text-start text-light">Program
                                            Study</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hideme">
        <div class="container mt-3">
            <div class="overflow-hidden w-100 "
                style="
                height: 500px;  
                background-image:url('{{ asset('assets/images/foto-all-dosen-visi-misi-page-cropped-1.jpeg') }}') ; 
                background-size: cover;
                background-repeat: no-repeat;
                background-position:center center; 
                border-radius:0 0 0 200px">
            </div>
        </div>
    </section>

    <section class="hideme">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-12 ">
                    <div class="owl-carousel owl-theme owl-loaded owl-drag" id="owl-2">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 1s ease 1s;">
                                <div class="owl-item active">
                                    <div class="item">
                                        <div class="mx-3 text-start">
                                            <img src="{{ asset('assets/images/aipt-uin-2019.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active">
                                    <div class="item">
                                        <div class="mx-3 text-start">
                                            <img src="{{ asset('assets/images/if-banpt-2018.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ">

                    <div class="d-flex pb-4  " style="color:black;">
                        <div class="col align-self-center">
                            <div class="d-block justify-content-center">
                                {{-- <div style="margin-right: 4px;">
                                        <img class="" src="{{ asset('storage' . $cui->logo) }}" alt="Teknik Informatika"
                                            height="100px" width="100px">
                                    </div>
                                    <span class="font-size-24 align-self-center">
                                        <h2 style="font-weight:1000">{!! $cui->logo_name !!}</h2>
                                    </span> --}}
                                <h3 class="fw-bold">
                                    Sertifikat Akreditasi <br>
                                    Jurusan Teknik Informatika dan <br>
                                    UIN Sunan Gunung Djati Bandung
                                </h3>
                                <p class="">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit laboriosam expedita
                                    voluptatem dolores animi illo modi, et accusamus amet. Asperiores facere autem vitae
                                    odit ex soluta a in illo voluptatibus!
                                </p>
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                Sertifikat AIPT UIN Sunan Gunung Djati Bandung
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">Placeholder content for this accordion, which is
                                                intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                                first item's accordion body.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                                Sertifikat BANPT Jurusan Teknik Informatika
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">Placeholder content for this accordion, which is
                                                intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                                second item's accordion body. Let's imagine this being filled with some
                                                actual content.</div>
                                        </div>
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
    <section class="hideme" style=" background-color: {{ $cui->card_color }};">

        <div class="container ">
            <div class=" py-5 mt-3 pt-3">
                <div class="row justify-content-center">
                    <div class="col-12 text-center mb-3 mt-5">
                        <h3 class="text-capitalize fw-bold">
                            Berita & Pengumuman
                        </h3>
                        <p>Tetap terhubung dengan berita dan informasi terbaru tentang berbagai aktivitas di Jurusan Teknik
                            Informatika</p>
                    </div>
                    <hr>
                </div>
                {{-- informasi terbaru --}}
                <div class="row justify-content-between mb-3">
                    <div class="col-6 font-size-24">
                        <p class="text-dark fw-bold my-auto">Informasi terbaru</p>

                    </div>

                    <div class="col-6 font-size-16 align-self-center  text-end">

                        <a href="{{ route('post.manager', 'berita') }}"
                            class="text-dark text-decoration-none d-inline-flex "><span class="align-middle">Informasi
                                Lainnya </span><img src="{{ asset('assets/images/Polygon 2.png') }}" alt=""
                                sizes="14px" srcset=""></a>
                    </div>
                </div>
                <div class="row font-size-12">
                    @foreach ($posts as $post)
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
                                        background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(255,255,255,0) 100%);">
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
                    @endForeach

                </div>
                <hr>
                {{-- pengumuman --}}
                <div class="row justify-content-between my-3 ">
                    <div class="col-6 font-size-24">

                        <p class="text-dark fw-bold my-auto">Pengumuman</p>

                    </div>
                    <div class="col-6 font-size-16 align-self-center  text-end">

                        <a href="{{ route('post.manager', 'pengumuman') }}"
                            class="text-dark text-decoration-none d-inline-flex"><span class="align-middle">Informasi
                                Lainnya </span><img src="{{ asset('assets/images/Polygon 2.png') }}" alt=""
                                sizes="14px" srcset=""></a>
                    </div>
                </div>
                <div class="row font-size-12">
                    @foreach ($pengumuman as $post)
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
                                        background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(255,255,255,0) 100%);">
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
                    @endForeach
                </div>
            </div>
        </div>
    </section>
    @if (isset($prestasi))
        <section class="hideme">
            <div class="container pb-3">
                <div class="row  py-4">
                    <div class="col-12 pt-3  text-center">
                        <h3 class="fw-bold">
                            Galeri Prestasi Dosen dan Mahasiswa
                        </h3>
                        <p>"Menjadikan teknologi sebagai panglima, bersama-sama merajut masa depan yang cerah." - Galeri
                            Dosen dan Mahasiswa Teknik Informatika UIN Sunan Gunung Djati Bandung.</p>
                        <hr>
                    </div>
                </div>
                <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="false">
                    <div class="carousel-indicators">

                        @foreach ($prestasi as $i => $p)
                            @if ($i == 0)
                                <button type="button" data-bs-target="#carouselExampleCaptions"
                                    data-bs-slide-to="{{ $i }}" class="active" aria-current="true"
                                    aria-label="Slide {{ $i + 1 }}"></button>
                            @else
                                <button type="button" data-bs-target="#carouselExampleCaptions"
                                    data-bs-slide-to="{{ $i }}"
                                    aria-label="Slide {{ $i + 1 }}"></button>
                            @endif
                        @endforeach

                    </div>
                    <div class="carousel-inner rounded-0 px-0">
                        @foreach ($prestasi as $i => $p)
                            @if ($i == 0)
                                <div class="carousel-item active">
                                    <a href="{{ route('post.detail', $p->slug) }}" class="text-decoration-none ">
                                        <div class="card rounded-0"
                                            style="height:420px;
                                        background-image:url('{{ asset('storage' . $p->thumbnail) }}') ; 
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                        background-position:center center;">
                                            <div class="card-body p-0">
                                                <div class="d-flex justify-content-center"
                                                    style="height:100%; background: rgb(0,0,0);
                                                background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(255,255,255,0) 100%);">
                                                    <div class="col-12 align-self-end p-3">

                                                        <div class="card-tittle fw-bold ">
                                                            <h3>
                                                                {{ Str::limit($p->title, 50, '...') }}
                                                            </h3>
                                                            <span class=""><i
                                                                    class="fa-solid fa-calendar"></i>{{ Carbon\Carbon::parse($p->created_at)->format('l, d F Y, H:m A') }}</span>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="carousel-item">
                                    <<a href="{{ route('post.detail', $p->slug) }}" class="text-decoration-none ">
                                        <div class="card rounded-0"
                                            style="height:4200px;
                                        background-image:url('{{ asset('storage' . $p->thumbnail) }}') ; 
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                        background-position:center center;">
                                            <div class="card-body p-0">
                                                <div class="d-flex justify-content-center"
                                                    style="height:100%; background: rgb(0,0,0);
                                                background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(255,255,255,0) 100%);">
                                                    <div class="col-12 align-self-end p-3">

                                                        <div class="card-tittle fw-bold ">
                                                            <h3>
                                                                {{ Str::limit($p->title, 50, '...') }}
                                                            </h3>
                                                            <span class=""><i
                                                                    class="fa-solid fa-calendar"></i>{{ Carbon\Carbon::parse($p->created_at)->format('l, d F Y, H:m A') }}</span>

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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
    @endif
    <section class="my-5 hideme">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-md-6 ">
                    <div class="card border-0 rounded">
                        <div class="card-body p-0 bg-white ">

                            <canvas class="w-100 h-100" id="myChart"></canvas>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-sm-12 font-size-18 align-self-center">
                    <h3 class="fw-bold  pt-md-0 pt-5">
                        Jumlah Peminat di Teknik Informatika<br>
                        Universitas Islam Negeri <br>
                        Sunan Gunung Djati Bandung
                    </h3>
                    <p>Peminat prodi teknik informatika UIN Sunan Gunung Djati Bandung selama satu dekade ditampilkan pada
                        grafik di samping. Data ini diharapkan dapat membantu melengkapi penyusunan rencana pengembangan
                        kegiatan pembelajaran di prodi Teknik Informatika UIN sunan Gunung Djati Bandung.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="hideme">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-3 mt-5">
                    <h3 class="text-capitalize fw-bold">
                        Tetap Terhubung Dengan Teknik Informatika
                    </h3>
                    <p>Tetap terhubung dengan dunia Teknologi! Ikuti terus perkembangan terbaru dari jurusan Teknik
                        Informatika UIN Sunan Gunung Djati melalui kanal media sosial kami.</p>
                </div>
            </div>
            <div class="d-flex justify-content-center">


                @foreach ($socials as $s)
                    <a href="{{ $s->url }}" class="nav-link link-dark">
                        <i class="px-3 fa-brands fa-square-{{ $s->name }}" style="font-size: 80px;"></i>
                    </a>
                @endforeach



            </div>
            <hr>
        </div>
    </section>
    @if (count($partner) > 0)
        <section class="">
            <div class="container my-5">

                <div class="row justify-content-center">
                    @foreach ($partner as $p)
                        <div class="  col-md-1 col-sm-3 py-md-3 py-sm-5 align-self-center">
                            <div class="d-flex justify-content-center">
                                <img class="img-fluid" src="{{ asset('storage' . $p->img) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {

                /* Check the location of each desired element */
                $('.hideme').each(function(i) {

                    var bottom_of_object = $(this).offset().top/1.5 + $(this).outerHeight() ;
                    var bottom_of_window = $(window).scrollTop() + $(window).height();

                    /* If the object is completely visible in the window, fade it it */
                    if (bottom_of_window > bottom_of_object) {

                        $(this).animate({
                            'opacity': '1'
                        }, 500);

                    }

                });

            });
            $('#owl-1').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                center: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 3
                    }
                }
            });
            $('#owl-2').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                center: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
            $('#owl-3').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                center: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        });
        const ctx = document.getElementById('myChart');
        var peminat = {{ Js::from($peminat) }}
        new Chart(ctx, {
            type: 'line',
            data: {

                datasets: [{
                    label: "Peminat Jurusan Teknik Informatika",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: peminat,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '$' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
    </script>
@endsection
