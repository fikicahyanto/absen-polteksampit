<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenggunaData as PD;

class PenggunaController extends Controller
{
    public function index(){
        $pengguna = PD::orderBy('id')->paginate(10);
        return view('pengguna.index', ['data' => $pengguna]);
    }

    public function create()
    {
      return view('pengguna.create');
    }

    public function store(Request $request)
    {
      $pengguna = new PD;
      $pengguna->id_user = $request->input('id_user');
      $pengguna->nama = $request->input('nama');
      $pengguna->id_departemen = $request->input('id_departemen');
      $pengguna->no_hp = $request->input('no_hp');
      $pengguna->save();
      return redirect()->route('pengguna_index');
    }

    public function edit($id)
    {
      $mesin = PD::find($id);
      return view('pengguna.edit', ['data' => $mesin]);
    }

    public function update(Request $request)
    {
      $id = $request->input('id');
      $pengguna = PD::find($id);
      $pengguna->id_user = $request->input('id_user');
      $pengguna->nama = $request->input('nama');
      $pengguna->id_departemen = $request->input('id_departemen');
      $pengguna->no_hp = $request->input('no_hp');
      $pengguna->save();
       
      return redirect()->route('pengguna_index');
    }

    public function delete($id)
    {
      PD::find($id)->delete();
      return redirect()->route('pengguna_index');
    }

}
