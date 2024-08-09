<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterUser as MU;
use App\FingerPrintMachine as FP;
use App\Http\Library\Zklibrary as ZK;

class MasteruserController extends Controller
{
    public function __construct()
    {
      ini_set('max_execution_time', 0);
      
    }
    public function _ParseData($data, $p1, $p2)
    {
      $data = " ".$data;
      $hasil = "";
      $awal = strpos($data, $p1);

      if ($awal != "") {
        $akhir = strpos(strstr($data, $p1), $p2);

        if ($akhir != "") {
          $hasil = substr($data, $awal + strlen($p1), $akhir - strlen($p1));

        } else {
          return "akhir kosong";
        }
      }

      return $hasil;
    }
    public function index(){
      $users = MU::orderBy('user_id')->get();
      return view('masteruser.index',['data' => $users]);
    }

    public function _checkExists($user_id)
    {
      $userData = MU::where('user_id', $user_id)->get();
      return $userData;
    }

    public function sinkronisasi(){
      $fp = FP::where('status', 1)->orderBy('ip')->get();

        if (count($fp) == 0) {
            return "tidak ada mesin absensi!";
        }
      foreach ($fp as $key => $value) {
        $IP = $value->ip;
        $Port = '80';

        if ($IP == "") {
          $IP = $value->ip;
        }
        
        $zk = new ZK($IP, $Port);
        $zk->connect();
        $zk->disableDevice();
        $users = $zk->getUser();
        $zk->enableDevice();
        $zk->disconnect();
        $user = MU::orderBy('id')->get();
        $create = [];
        foreach($users as $keys => $value){

          if ($user != "") {
            if (!count($this->_checkExists($value[0])) > 0) {
              $create[] = [
              'user_id' => $value[0],
              'username' =>  $value[1],
              'id_role' => $value[2],
              'password' => $value[3]
              ];
            }
          }
        }  
        echo count($create) . '<br>';
        echo "bates per mesin<br><br>";
        MU::insert($create);
      }
      toast('Sinkronisasi berhasil','success');
      return back();
        // return redirect()->route('masteruser_index');

    }

    public function edit($id)
    {
      $user = MU::find($id);
      return view('masteruser.edit', ['data' => $user]);
    }

    public function update(Request $request)
    {
      $id = $request->input('id');
      $user = MU::find($id);
      $user->user_id = $request->input('user_id');
      $user->username = $request->input('username');
      $user->id_role = $request->input('id_role');
      $user->no_hp = $request->input('no_hp');
      $user->save();
       
      return redirect()->route('masteruser_index');
    }

    public function filter(Request $request){
      $cari = $request->cari;
      $data = MU::where('username','like',"%".$cari."%")
              ->orderBy('user_id')->paginate();

      return view('masteruser.index', ['data' => $data]);
    }
    public function delete($id)
    {
      MU::find($id)->delete();
      toast('berhasil didelete','success');
      return back();
    }
}
