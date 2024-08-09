<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\FingerprintMachine as FP;

class FPController extends Controller
{
    public function index()
    {
      $fp = FP::orderBy('ip')->paginate(10);
      return view('fp.index', ['data' => $fp]);
    }

    public function create()
    {
      return view('fp.create');
    }

    public function store(Request $r)
    {
      $fp = new FP;
      $fp->ip = $r->input('ip');
      $fp->comkey = $r->input('comkey');
      // $fp->port = $r->input('port');
      $fp->status = $r->input('status');
      $fp->save();
      return redirect()->route('fingerprint_index');
    }

    public function edit($id)
    {
      $mesin = FP::find($id);
      return view('fp.edit', ['data' => $mesin]);
    }

    public function update(Request $r)
    {
      $id = $r->input('id');
      $fp = FP::find($id);
      $fp->ip = $r->input('ip');
      $fp->comkey = $r->input('comkey');
      // $fp->port = $r->input('port');
      $fp->status = $r->input('status');
      $fp->save();
      return redirect()->route('fingerprint_index');
    }

    public function delete($id)
    {
      FP::find($id)->delete();
      return redirect()->route('fingerprint_index');
    }

    public function check_connection($id)
    {
      $mesin = FP::find($id);
      $IP = $mesin->ip;
      // $port = $mesin->port;

      $connect = @fsockopen($IP, '80', $errno, $errstr, 1);
      // dd($connect);
      // $connect = @fsockopen($IP, $port, $errno, $errstr, 1);
      if ($connect) {
        toast('Mesin Berhasil Terhubung','success');
        return back();

        // return "Mesin terkoneksi! <br> <a href='" . route('fingerprint_index') . "'>Kembali</a>";
      } else {
        toast('Mesin Tidak Terhubung','error');
        // Alert::success('Robots are working!','Success Message');
        return back();
        // return "Mesin tidak terkoneksi! <br> <a href='" . route('fingerprint_index') . "'>Kembali</a>";
      }
    }

    public function active($id)
    {
      $mesin = FP::find($id);
      $mesin->status = 1;
      $mesin->save();
      return redirect()->route('fingerprint_index');
    }

    public function deactive($id)
    {
      $mesin = FP::find($id);
      $mesin->status = 0;
      $mesin->save();
      return redirect()->route('fingerprint_index');
    }
}
