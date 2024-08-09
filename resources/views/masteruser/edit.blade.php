@extends('welcome')

@section('content')
@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master User</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>     
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" action="{{ route('masteruser_update') }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="form-group">
                      <label for="user_id">ID User:</label>
                      <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $data->user_id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Nama:</label>
                        <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" value="{{ $data->username }}">
                    </div>
                    <div class="form-group">
                        <label for="id_role">ID Departemen:</label>
                        <input type="text" class="form-control" id="id_role" name="id_role" value="{{ $data->id_role }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP:</label>
                        <input type="text" class="form-control" placeholder="Enter No HP" id="no_hp" name="no_hp" value="{{ $data->no_hp }}">
                    </div>
                    <a href="{{route('masteruser_index')}}" class="btn btn-danger">Back</a>
                    <button id="btn_create" class="btn btn-primary">Submit</button>
                </form> 
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
@section('asset_footer')
@endsection
