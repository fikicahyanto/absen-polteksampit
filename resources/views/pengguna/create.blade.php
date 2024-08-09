@extends('welcome')
@section('content')

<div class="row row-main">
  <div class="col s12 m12 l12">
    <div class="card-panel">
      <div class="row">
        <div class="col s12 m5 l5">
          <nav class="cyan nav-breadcrumb">
            <div class="nav-wrapper">
              <div class="col s12">
                <a href="{{ url('books') }}" class="breadcrumb">Pengguna</a>
                <a href="{{ url('books/create') }}" class="breadcrumb">Tambah Pengguna</a>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="row margin-bottom">
        <div class="col s12 m12 l12">
          <h4>Tambah Pengguna</h4>
        </div>
      </div>
      <div class="row">
        <form class="col s12" method="post" action="{{ route('pengguna_create') }}">
          {!! csrf_field() !!}
          <div class="row margin-bottom">
            <div class="input-field col s12 m12 l12">
              <input id="id_user" type="text" name="id_user">
              <label for="id_user">ID user</label>
            </div>
            <div class="input-field col s12 m12 l12">
              <input id="nama" type="text" name="nama">
              <label for="nama">Nama Pengguna</label>
            </div>
            <div class="input-field col s12 m12 l12">
                <input id="id_departemen" type="text" name="id_departemen">
                <label for="id_departemen">ID Departemen</label>
              </div>
              <div class="input-field col s12 m12 l12">
                <input id="no_hp" type="text" name="no_hp">
                <label for="no_hp">No HP</label>
              </div>
            {{-- <div class="input-field col s12 m12 l12">
              <select name="status" id="status">
                <option selected disabled>Status</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
              </select>
            </div> --}}
          </div>
          <div class="row right">
            <button class="btn waves-effect waves-light cyan" id="btn_create">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('asset_footer')
  {{-- <script>
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
  </script> --}}
@endsection
