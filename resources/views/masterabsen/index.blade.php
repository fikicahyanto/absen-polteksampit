@extends('welcome')

@section('content')
@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Notifikasi Absensi</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Notifikasi Absensi</h6>     
                <form class="cari" action="{{route('filter_masterabsen')}}" method="GET">
                <div class="col-xl-2">
                  <div class="row">
                        <input type="date" name="cari_tgl" placeholder="Cari Berdasarkan Tanggal .." value="{{ old('cari_tgl') }}">
                        <button class="btn btn-primary" type="submit" id="cari">
                            <i class="fas fa-search fa-sm"></i>
                        </button>                    
                  </div>
                </div>
                </form>    
                <form action="{{route('cetak_pdf')}}" method="GET">
                  <div class="col-xl-4">
                    <div class="row">
                          <input type="date" name="cari_tgl" placeholder="Cari Berdasarkan Tanggal .." value="{{ old('cari_tgl') }}">
                          <button class="btn btn-danger" type="submit" id="cari">
                            <i class="fas fa-print fa-sm"> PDF</i>
                        </button> 
                        <a href="excel" class="btn btn-success" target="_blank" rel="noopener noreferrer"><i class="fas fa-print fa-sm"> EXCEL</i></a>
                        </div>
                  </div>
                  </form>      
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th>No.</th>
                          <th>ID Users</th>
                          <th>Username</th>
                          <th>No HP</th>
                          <th>Tanggal & Waktu Kehadiran</th>
                          <th>Status Pesan</th>
                          <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                          <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{ $value->user_id}}</td>
                            <td>{{ $value->username }}</td>
                            <td>{{ $value->no_hp}}</td>
                            <td>{{ date('d F Y H:i:s', strtotime($value->datetime)) }}</td>
                            <td>@if ($value->status_pesan == 1)
                                dikirim                      
                              @else
                                Belum dikirim
                              @endif
                            </td>
                            <td>
                              @if ($value->status_pesan == "0")
                              <a href="{{ route('pesan_kirim_activ', ['id' => $value->id]) }}" class="btn btn-danger" data-position="top" data-delay="50" data-tooltip="Kirim pesan"><i class="bi bi-send"></i></a>
                              @else
                              {{-- <a href="{{ route('pesan_kirim_batal', ['id' => $value->id]) }}" class="btn waves-effect waves-light green tooltipped" data-position="top" data-delay="50" data-tooltip="Batal Kirim"><i class="material-icons">done</i></a> --}}
                              <a href="#" class="btn btn-success"><i class="fas fa-check"></i></a>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection