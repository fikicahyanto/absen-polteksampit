@extends('welcome')

@section('content')
@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Users</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Master Users</h6>     
            <div class="col">
                <div class="row right">
                  <div class="col"></div>
                  <a href="{{ route('sinkron_user') }}" class="m-9 left btn btn-info" data-tooltip="Sinkronisasi"><i class="fas fa-sync"><br/>Sinkron</i></a>
                </div>
              </div>   
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th>NO</th>
                          <th>User ID</th>
                          <th>NAME</th>
                          <th>ROLE</th>
                          <th>NO HP</th>
                          <th>PASSWORD</th>
                          <th>ACTION</th>
                        </tr>
                       </thead>
                       <tbody>
                        @foreach ($data as $key => $value)
                          {{-- @foreach($data as $key_s => $duplict)
                          @php
                            if ($duplict['user_id'] == $value['user_id']) 
                                if ($duplict != $value) 
                                  $dupl = $duplict['user_id'];
                                  dd($dupl);
                             
                          @endphp
                          @endforeach --}}

                            {{-- @if($value['user_id'] == $dupl)
                              @php
                                  $clor = 'red';
                              @endphp
                            @else
                              @php
                                  $clor = '';
                              @endphp
                            @endif --}}
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $value->user_id }}</td>
                            <td>{{ $value->username }}</td>
                            <td>{{ $value->id_role }}</td>
                            <td>{{ $value->no_hp }}</td>
                            <td>{{ $value->password }}</td>
                            <td>
                                <a href="{{ route('masteruser_edit', ['id' => $value->id]) }}" class="btn btn-warning" data-position="top" data-delay="50" data-tooltip="Ubah masteruser"><i class="bi bi-pencil">edit</i></a>
                                <a href="{{ route('masteruser_delete', ['id' => $value->id]) }}" class="btn btn-danger"><i class="bi bi-trash">delete</i></a>
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