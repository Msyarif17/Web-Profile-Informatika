@extends('layouts.dash')
@section('plugins.Datatables', true)
@push('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.0/chart.min.js"
        integrity="sha512-qKyIokLnyh6oSnWsc5h21uwMAQtljqMZZT17CIMXuCQNIfFSFF4tJdMOaJHL9fQdJUANid6OB6DRR0zdHrbWAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@section('content')
    <section class="content pt-4">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-md-3">
                <div class="card shadow border-0 rounded">
                  <div class="card-body">
                    <span><i class="fa-solid fa-users"></i> User Online {{$online}}</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card shadow border-0 rounded">
                  <div class="card-body">
                    <span><i class="fa-solid fa-newspaper"></i> Jumlah Post {{$post}}</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card shadow border-0 rounded">
                  <div class="card-body">
                    <span><i class="fa-solid fa-users"></i> Jumlah User {{$user}}</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card shadow border-0 rounded">
                  <div class="card-body">
                    <span><i class="fa-solid fa-message"></i> Message </span>
                    <span class="badge badge-light">0</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-md-6 col-sm-12">
                <div class="card shadow border-0 rounded">
                    <div class="card-header">
                        <p clas="card-title"> Post Perhari </p>
                    </div>
                    <div class="card-body p-0 bg-white ">

                        <canvas class="w-100 h-100" id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card shadow border-0 rounded">
                    <div class="card-header">
                        <p clas="card-title"> Jumlah Kunjungan Perhari </p>
                    </div>
                    <div class="card-body p-0 bg-white ">

                        <canvas class="w-100 h-100" id="myChart2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card mt-md-4 mt-sm-3 h-100">
                    <div class="card-header">
                        <h3 class="card-title">Post</h3>
                        <div class="float-right">
                            <a href="{{ route('dash.post.create') }}" class="btn btn-success btn-flat btn-sm"
                                title="Tambah">Tambah</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Tanggal Pembuatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="row mt-md-4 mt-sm-3">
                    <div class="col-12">
                        <a class="text-dark" href="{{route('dash.maintenance')}}">
                            <div class="card {{!$maintenance?'bg-danger':'bg-success'}}">
                                <div class="card-body">
                                    <p class="card-title">
                                        {{!$maintenance?'Maintenance':'Live'}}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="text-dark" href="{{route('dash.backup')}}">
                            <div class="card bg-primary">
                                <div class="card-body">
                                    <p class="card-title">
                                        Backup Database (Masih proses)
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="text-dark" href="#">
                            <div class="card bg-primary">
                                <div class="card-body">
                                    <p class="card-title">
                                        Telegram Bot (Comming Soon)
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="text-dark" href="#">
                            <div class="card bg-danger">
                                <div class="card-body">
                                    <p class="card-title">
                                        Chat Bot (Comming Soon)
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@push('js')
    <script>
        $(function() {
            $('#data').DataTable({
                serverSide: true,
                processing: true,
                searchDelay: 1000,
                ajax: {
                    url: '{{ route('dash.index') }}',
                },
                columns: [{
                        data: 'judul'
                    },
                    {
                        data: 'kategori'
                    },
                    {
                        data: 'created_by'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'status',
                        name: 'deleted_at',
                        render: function(datum, type, row) {
                            if (row.status == 'Active') {
                                return `<span class="badge badge-success">${row.status}<span>`;
                            } else {
                                return `<span class="badge badge-danger">${row.status}<span>`;
                            }

                        }
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },

                ]
            });
        });
    </script>
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var post = {{ Js::from($data[1]) }}
        var visit = {{ Js::from($data[0]) }}
        const ctx = document.getElementById('myChart');
        const ctx2 = document.getElementById('myChart2');
        new Chart(ctx, {
            type: 'line',
            data: {
                datasets: [{
                    label: "Jumlah Post Perhari",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "#202895",
                    pointRadius: 3,
                    pointBackgroundColor: "#202895",
                    pointBorderColor: "#202895",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#202895",
                    pointHoverBorderColor: "#202895",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: post,
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
        new Chart(ctx2, {
            type: 'line',
            data: {

                datasets: [{
                    label: "Jumlah Kunjungan Perhari",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "#F94A29",
                    pointRadius: 3,
                    pointBackgroundColor: "#F94A29",
                    pointBorderColor: "#F94A29",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#F94A29",
                    pointHoverBorderColor: "#F94A29",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: visit,
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
@endpush
