@extends('welcome')

@section('content')
@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mesin Absen</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('fingerprint_create') }}" class="btn btn-primary" data-position="top" data-delay="50" data-tooltip="Tambah Mesin Absensi"><i class="fas fa-plus"> add</i></a>  
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th>No.</th>
                          <th>IP Address</th>
                          <th>Comkey</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                       </thead>
                       <tbody>
                        @foreach ($data as $key => $value)
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->ip }}</td>
                            <td>{{ $value->comkey }}</td>
                            <td>{{ ($value->status == 1) ? "Aktif" : "Tidak Aktif" }}</td>
                            <td>
                              @if ($value->status == 1)
                                <a href="{{ route('fingerprint_deactive', ['id' => $value->id]) }}" class="btn btn-danger" data-position="top" data-delay="50" data-tooltip="Non Aktifkan Mesin Fingerprint"><i class="bi bi-power"> Non Aktifkan</i></a>
                              @else
                                <a href="{{ route('fingerprint_active', ['id' => $value->id]) }}" class="btn btn-success" data-position="top" data-delay="50" data-tooltip="Aktifkan Mesin Fingerprint"><i class="fas fa-check"> Aktifkan</i></a>
                              @endif
                              <a href="{{ route('fingerprint_check_connection', ['id' => $value->id]) }}" class="btn btn-primary" data-position="top" data-delay="50" data-tooltip="Cek Koneksi"><i class="bi bi-wifi"> koneksi</i></a>
                              <a href="{{ route('fingerprint_edit', ['id' => $value->id]) }}" class="btn btn-warning" data-position="top" data-delay="50" data-tooltip="Ubah Mesin Fingerprint"><i class="bi bi-pencil"> edit</i></a>
                              <a href="{{ route('fingerprint_delete', ['id' => $value->id]) }}" class="btn btn-danger"><i class="bi bi-trash"> delete</i></a>
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
