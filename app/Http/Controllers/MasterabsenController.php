<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FingerprintMachine as FP;
use App\UserData as UD;
use App\Masterabsen as MA;
use GuzzleHttp\Client;
use PDF;
use Excel;
use App\Exports\AbsenExport;

class MasterabsenController extends Controller
{
    public function __construct()
    {
      ini_set('max_execution_time', 0);
    }

    public function index()
    {
      $users = MA::join('master_users', 'masterabsens.user_id', '=', 'master_users.user_id')
                ->select('masterabsens.*', 'master_users.username','master_users.no_hp')
                ->orderBy('datetime','DESC')
                ->get();
      $absensi = MA::orderBy('datetime','ASC')->get();
      return view('masterabsen.index', ['data' => $users]);
    }

    public function sms_send($id,$datetime){
        $absensi = MA::get();
        $abs = MA::join('master_users', 'masterabsens.user_id', '=', 'master_users.user_id')
        ->select('masterabsens.*', 'master_users.username','master_users.no_hp')
        ->where('masterabsens.id',$id)
        ->get();

            foreach($abs as $key => $val){
                $isi_pesan = "Saudara/(i) $val->username hadir di Politeknik Sampit pada tanggal ".date('d F Y H:i:s', strtotime($val->datetime))."";

                // dd($val);
                $userkey = 'bu2acx';
                $passkey = '400485Aa';
                $telepon = $val->no_hp;
                $message = $isi_pesan;
                $url = 'https://gsm.zenziva.net/api/sendWA/';
                $curlHandle = curl_init();
                curl_setopt($curlHandle, CURLOPT_URL, $url);
                curl_setopt($curlHandle, CURLOPT_HEADER, 0);
                curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
                curl_setopt($curlHandle, CURLOPT_POST, 1);
                curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
                    'userkey' => $userkey,
                    'passkey' => $passkey,
                    'nohp' => $telepon,
                    'pesan' => $message
                ));
                $results = json_decode(curl_exec($curlHandle), true);
                curl_close($curlHandle);
                toast('Pesan sudah dikirim','success');
                return back();
                // return redirect()->route('indexs');
            }
    }
    public function kirim($id)
    {
        $absen = MA::find($id);
        $this->sms_send($id,$absen->datetime);
        $absen->status_pesan = "1";
        $absen->save();
        return redirect()->route('indexs');
    }

    public function batal_kirim($id)
    {
      $absen = MA::find($id);
      $absen->status_pesan = "";
      $absen->save();
      return redirect()->route('indexs');
    }

    public function filter(Request $request){
        $cari_tgl = $request->cari_tgl;
 
        $data = MA::join('master_users', 'masterabsens.user_id', '=', 'master_users.user_id')
                ->select('masterabsens.*', 'master_users.username','master_users.no_hp')
                ->whereDate('datetime','like',"%".$cari_tgl."%")
                ->orderBy('datetime','DESC')
                ->paginate(1000);     
                            
        return view('masterabsen.filter', ['data' => $data]);
    }

    public function exportPDF(Request $request) {
      // $data = MA::all();
      $cari_tgl = $request->cari_tgl;
        $data = MA::join('master_users', 'masterabsens.user_id', '=', 'master_users.user_id')
                ->select('masterabsens.*', 'master_users.username','master_users.no_hp')
                ->where('datetime','like',"%".$cari_tgl."%")
                ->orderBy('datetime','DESC')
                ->paginate(1000);

      $pdf = PDF::loadView('masterabsen.cetak', ['data' => $data]);
      
      return $pdf->download('absen.pdf');
      
    }

    public function exportEXCEL(Request $request) {

      return Excel::download(new AbsenExport, 'siswa.xlsx');
      
    }
}
