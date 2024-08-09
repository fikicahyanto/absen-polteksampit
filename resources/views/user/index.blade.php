@extends('welcome')

@section('content')
@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Absensi</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>     
            <div class="col">
              <div class="row right">
                <div class="col"></div>
                <a href="{{ route('sinkronisasi') }}" class="m-9 left btn btn-info" data-tooltip="Sinkronisasi"><i class="fas fa-sync"><br/>Sinkron</i></a>
              </div>
            </div>      

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th>No.</th>
                          <th>User ID</th>
                          <th>Datetime</th>
                          <th>Machine Id</th>
                        </tr>
                       </thead>
                       <tbody>
                        @foreach ($data as $key => $value)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->user_id }}</td>
                            <td>{{ $value->datetime }}</td>
                            <td>{{ $value->machine_id }}</td>
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