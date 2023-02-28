@extends('frontend.component.master')
@section('css')
@endsection
@section('content')
    @include('frontend.component.carousel')
    <section>
        <div class="container py-5 mt-3 pt-3">
            <div class="row  py-5">
                <div class="col-xl-6 col-md-5 col-12 align-self-center ">
                    <div class="d-flex pb-4  fw-bold" style="color:black;">
                        <div class="col align-self-center">
                        <div class="d-inline-flex justify-content-center">
                                <div style="margin-right: 4px;">
                                    <img class="" src="{{ asset('storage'.$cui->logo) }}"
                                        alt="Teknik Informatika" height="100px" width="100px">
                                </div>
                                <span class="font-size-24 align-self-center">
                                    <h2 style="font-weight:1000">{!!$cui->logo_name!!}</h2>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-7 col-12 align-self-center pt-md-0 pt-sm-3">
                    <div class="ratio ratio-16x9 rounded overflow-hidden" style="box-shadow: 0px 10px 10px;">
                        <iframe src="{{ $cui->video_thumbnail }}" title="Video Player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="my-5 py-5 mt-3 pt-3">
                {{-- informasi terbaru --}}
                <div class="row justify-content-between mb-5">
                    <div class="col-6 font-size-24">
                        <div class="btn btn-primary border-0  ">

                            <p class="text-light fw-bold my-auto">Informasi terbaru</p>

                        </div>
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
                                <div class="card ">
                                    <img src="{{ asset('storage' . $post->thumbnail) }}" alt=""
                                        class="card-img-top img-fluid"
                                        style="height:152px;object-fit: cover;object-position: center;">
                                    <div class="card-body overflow-auto" style="height:200px;">
                                        <div class="card-tittle fw-bold ">{{ $post->title }}</div>
                                        <div class="row p-0 m-0 justify-content-between py-1">
                                            <div class="col-6 p-0 m-0 text-start"><span class=""><i
                                                        class="fa-solid fa-calendar"></i>{{ Carbon\Carbon::parse($post->created_at)->format('l, d F Y, H:m A') }}</span>
                                            </div>
                                            <div class="col-6 p-0 m-0 text-end"><span class=""><i
                                                        class="fa-solid fa-comment"></i> 0 Comment</span></div>
                                        </div>
                                        <div class="card-text ">
                                            <p>{{ Str::limit(strip_tags($post->content), 100, '...') }}</p>

                                        </div>
                                        <div class="text-end">
                                            Baca
                                            selengkapnya <img src="{{ asset('assets/images/Vector.png') }}" alt="">

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endForeach

                </div>
                {{-- pengumuman --}}
                <div class="row justify-content-between my-5 pt-2">
                    <div class="col-6 font-size-24">
                        <div class="btn btn-primary border-0  ">

                            <p class="text-light fw-bold my-auto">Pengumuman</p>

                        </div>
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
                            <div class="card">
                                <img src="{{ asset('storage' . $post->thumbnail) }}" alt=""
                                    class="card-img-top img-fluid"
                                    style="height:152px;object-fit: cover;object-position: center;">
                                <div class="card-body">
                                    <div class="card-tittle fw-bold ">{{ $post->title }}</div>
                                    <div class="row p-0 m-0 justify-content-between py-1">
                                        <div class="col-6 p-0 m-0 text-start"><span class=""><i
                                                    class="fa-solid fa-calendar"></i>{{ Carbon\Carbon::parse($post->created_at)->format('l, d F Y, H:m A') }}</span>
                                        </div>
                                        <div class="col-6 p-0 m-0 text-end"><span class=""><i
                                                    class="fa-solid fa-comment"></i> 0 Comment</span></div>
                                    </div>
                                    <div class="card-text ">
                                        <p>{{ Str::limit(strip_tags($post->content), 100, '...') }}</p>

                                    </div>
                                    <div class="text-end">
                                        <a href="{{ route('post.detail', $post->slug) }}"
                                            class="text-decoration-none ">Baca
                                            selengkapnya <img src="{{ asset('assets/images/Vector.png') }}"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endForeach
                </div>
            </div>
        </div>
    </section>
    @if (isset($prestasi) > 0)
        <section class="gallery">
            <div class="container pb-3">
                <div class="row my-3 pt-3">
                    <div class="col-12 pt-3 font-size-24 fw-bold ">
                        Galeri Prestasi Dosen dan Mahasiswa
                    </div>
                </div>
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
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
                    <div class="carousel-inner rounded">
                        @foreach ($prestasi as $i => $p)
                            @if ($i == 0)
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage' . $p->banner) }}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block justify-content-center text-wrap bg-dark rounded px-5">
                                        <h5 class="text-capitalize text-center text-shadow fw-bold">{{ $p->title }}</h5>
                                        <p>{{ Str::limit(strip_tags($p->content), 100, '...') }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img src="{{ asset('storage' . $p->banner) }}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block justify-content-center text-wrap bg-dark rounded px-5">
                                        <h5 class="text-capitalize text-center text-shadow fw-bold">{{ $p->title }}</h5>
                                        <p>{{ Str::limit(strip_tags($p->content), 100, '...') }}</p>
                                    </div>
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
    <section class="my-4">
        <div class="container">
            <div class="row justify-content-between my-5 pt-2">
                <div class="col-sm-6 col-md-6 font-size-24">
                    <div class="btn btn-primary border-0  ">

                        <p class="text-light fw-bold my-auto">Peminat Prodi Teknik Informatika</p>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-12 font-size-18 fw-bold align-self-center">
                    <p>Peminat prodi teknik informatika UIN Sunan Gunung Djati Bandung selama satu dekade ditampilkan pada
                        grafik di samping. Data ini diharapkan dapat membantu melengkapi penyusunan rencana pengembangan
                        kegiatan pembelajaran di prodi Teknik Informatika UIN sunan Gunung Djati Bandung.</p>
                </div>
                <div class="col-sm-12 col-md-7 ">
                    <div class="card shadow border-0 rounded">
                        <div class="card-body p-0 bg-white ">

                            <canvas class="w-100 h-100" id="myChart"></canvas>
                        </div>
                    </div>

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
                @foreach ($partner as $p)
                    <div class="col-3  col-md-4 col-sm-3 py-md-3 py-sm-5 align-self-center">
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid" src="{{ asset('storage' . $p->img) }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        var peminat = {{Js::from($peminat)}}
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
