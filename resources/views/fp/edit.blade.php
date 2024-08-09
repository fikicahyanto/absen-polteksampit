@extends('welcome')

@section('content')
@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mesin Absen</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Mesin</h6>     
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" action="{{ route('fingerprint_update') }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="form-group">
                      <label for="ip">IP address Mesin:</label>
                      <input type="text" class="form-control" placeholder="Enter IP Address Mesin" id="ip" name="ip" value="{{ $data->ip }}">
                    </div>
                    <div class="form-group">
                        <label for="comkey">Com key:</label>
                        <input type="text" class="form-control" placeholder="Enter Com key Mesin" id="comkey" name="comkey" value="{{ $data->comkey }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" name="status" id="status">
                            <option selected disabled>Status</option>
                            <option value="1" @if ($data->status == 1) selected @endif>Aktif</option>
                            <option value="0" @if ($data->status == 0) selected @endif>Tidak Aktif</option>
                        </select>
                      </div> 
                      <a href="{{route('fingerprint_index')}}" class="btn btn-danger">Back</a>
                    <button id="btn_create" class="btn btn-primary">Submit</button>
                </form> 
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
@section('asset_footer')
  <script>
  $(document).ready(function() {
    $('#comkey').mask('00000');
    $('#ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      translation: {
        'Z': {
          pattern: /[0-9]/, optional: true
        }
      }
    });
    $('select').material_select();
  });
  </script>
@endsection
