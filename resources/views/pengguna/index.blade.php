@extends('welcome')

@section('content')
  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        <div class="row">
          <div class="col s12 m4 l4">
            <nav class="cyan nav-breadcrumb">
              <div class="nav-wrapper">
                <div class="col s12 m12 l12">
                  <a class="breadcrumb">Data Pengguna</a>
                </div>
              </div>
            </nav>
          </div>
          <div class="col s12 m8 l8">
            <div class="row right">
              <div class="col s12 m12 l12">
                <a href="{{ route('pengguna_create') }}" class="btn waves-effect waves-light cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Tambah Pengguna"><i class="material-icons">add_circle</i></a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Tabel Data Pengguna</h4>
          </div>
        </div>
        <table class="striped responsive-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>User ID</th>
              <th>Nama</th>
              <th>Departemen ID</th>
              <th>NO HP</th>
              <th>Action</th>
            </tr>
           </thead>
          <tbody>
            @foreach ($data as $key => $value)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->id_user }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->id_departemen }}</td>
                <td>{{ $value->no_hp }}</td>
                <td>
                  <a href="{{ route('pengguna_edit', ['id' => $value->id]) }}" class="btn waves-effect waves-light cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Ubah Pengguna"><i class="material-icons">edit</i></a>
                  <a href="{{ route('pengguna_delete', ['id' => $value->id]) }}" class="btn waves-effect waves-light red tooltipped" data-position="top" data-delay="50" data-tooltip="Hapus Pengguna"><i class="material-icons">delete</i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <div class="right">
              {{ $data->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
