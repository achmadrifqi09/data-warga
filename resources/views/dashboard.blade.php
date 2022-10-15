@extends('layout.master')

@section('title')
    <title>Dashboard - RW 02 Tlogomas</title>
@endsection
{{-- No kk, RT --}}
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Warga</h1>
                    <h5 class="mt-2">Total Perkategori Warga</h5>
                    <div class="row row-cols-1 row-cols-md-3 g-4 mb-4 ">
                        <div class="col">
                          <div class="card bg-success" id="wrap-category">
                           
                            <div class="card-body">
                              <h5 class="card-title text-light">Total Warga</h5>
                                <div class="wrap-card d-flex align-items-center">
                                    <i class="fas fa-users text-light"></i>
                                    <div class="count-title ms-2 text-light" >{{ $count_total }}</div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card bg-success" id="wrap-category">
                           
                            <div class="card-body">
                              <h5 class="card-title text-light">Laki-Laki</h5>
                              <div class="wrap-card d-flex align-items-center">
                                <i class="fas fa-male text-light"></i>
                                <div class="count-title ms-2 text-light">{{ $mele }}</div>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card bg-success" id="wrap-category">
                           
                            <div class="card-body">
                              <h5 class="card-title text-light">Perempuan</h5>
                              <div class="wrap-card d-flex align-items-center">
                                <i class="fas fa-female text-light"></i>
                                <div class="count-title ms-2 text-light">{{ $famele }}</div>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card bg-success" id="wrap-category">
                           
                            <div class="card-body">
                              <h5 class="card-title text-light">Menikah</h5>
                              <div class="wrap-card d-flex align-items-center">
                                <i class="fas fa-user-friends text-light"></i>
                                <div class="count-title ms-2 text-light">{{ $married }}</div>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                            <div class="card bg-success" id="wrap-category">
                             
                              <div class="card-body">
                                <h5 class="card-title text-light">Belum Menikah</h5>
                                <div class="wrap-card d-flex align-items-center">
                                    <i class="fas fa-user text-light"></i>
                                  <div class=" count-title ms-2 text-light">{{ $not_married }}</div>
                              </div>
                              </div>
                            </div>
                          </div>
                      </div>
                        
                        <div class="card mb-4 mt-3">
                            <div class="card-body">
                
                                <h5 class="mt-4">Klasifikasi Umur Warga</h5>
                                    <ul class="list-group ">
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">Anak-Anak</div>
                                                Usia 0 - 16 tahun
                                            </div>
                                            <span class="badge bg-primary">{{ $childern }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">Remaja</div>
                                                Usia 17 - 25 tahun
                                            </div>
                                            <span class="badge bg-primary">{{ $teen }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">Dewasa</div>
                                                Usia 26 - 45 tahun
                                            </div>
                                            <span class="badge bg-primary">{{ $adult }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">Pra Lansia</div>
                                                Usia 46 - 55 tahun
                                            </div>
                                            <span class="badge bg-primary">{{ $pre_elderly }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">Lansia</div>
                                                Usia 56 - atas
                                            </div>
                                            <span class="badge bg-primary">{{ $elderly }}</span>
                                        </li>
                                    </ul>
                            </div>            
                    
                        </div>
                        <div class="card">
                          <div class="card-body">
                              <div class="pie-chart" id="pie-chart"></div>
                          </div>
                        </div>
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <b>Tabel Data Warga</b>
                            </div>
                            <div class="dropdown mt-4 ms-3">
                                <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                  Menu
                                </a>
                              
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="/create"><i class="fas fa-plus"></i> Tambah Data Warga</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/dashboard/print-view"><i class="fas fa-print"></i> Lihat dan Cetak</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/dashboard/export-data"><i class="fas fa-arrow-down"></i> Download Data (Excel)</a></li>
                                </ul>
                              </div>
    
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Nomor KK</th>
                                            <th>Alamat Rumah</th>
                                            <th>Rukun Tetangga</th>
                                            <th>Agama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Status Perkawinan</th>
                                            <th>Pekerjaan</th>
                                            <th>Kewarganegaraan</th>
                                            <th>Aksi</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataset as $data)  
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->number_of_kk }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>{{ $data->neighbourhood->neighbourhood_name }}</td>
                                            <td>{{ $data->religion->religion_name }}</td>
                                            <td>{{ $data->gender->gender_name }}</td>
                                            <td>{{ $data->place_of_birth }}</td>
                                            <td>{{ $data->date_of_birth }}</td>
                                            <td>{{ $data->status->status_name }}</td>
                                            <td>{{ $data->proffesion }}</td>
                                            <td>{{ $data->state->state_name }}</td>
                                            <td class="d-flex">
                                              <a href="/dashboard/posts/{{ $data->id }}/edit" class="btn btn-warning btn-sm text-light"><i class="fas fa-pen"></i></a>
                                              <form action="/dashboard/posts/{{ $data->id }}" method="POST" class="ms-1">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data {{ $data->name }} ?')"><i class="fas fa-trash-alt"></i></button>
                                              </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
            
                    
</main>
<script>
  Highcharts.chart('pie-chart', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Presentase Umur Penduduk'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
        valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        }
    }
  },
  series: [{
    name: 'Brands',
    colorByPoint: true,
    data: [{
        name: 'Anak-Anak',
        y: {{ $childern }}
    }, {
        name: 'Remaja',
        y: {{ $teen }}
    }, {
        name: 'Dewasa',
        y: {{ $adult }}
    }, {
        name: 'Pra Lansia',
        y: {{ $pre_elderly }}
    }, {
        name: 'Lansia',
        y: {{ $elderly }}
    }]
  }]
  });
        
</script>
    
@endsection