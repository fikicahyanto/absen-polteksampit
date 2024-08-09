<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Masterabsen as MA;


class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:belajar-membuat-cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'belajar cront';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $abs = MA::join('master_users', 'masterabsens.user_id', '=', 'master_users.user_id')
      ->select('masterabsens.*', 'master_users.username','master_users.no_hp')
      ->where('masterabsens.status_pesan',"0")
      ->limit(1)
      ->orderBy('id','ASC')
      ->get();
        foreach($abs as $key => $val){
            $isi_pesan = "Saudara/(i) $val->username hadir di Politeknik Sampit pada tanggal ".date('d F Y H:i:s', strtotime($val->datetime))."";
                $userkey = 'bu2acx';
                $passkey = '400485Aa';
                $telepon = $val->no_hp;
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
                    'pesan' => $isi_pesan
                ));
                $results = json_decode(curl_exec($curlHandle), true);
                curl_close($curlHandle);

                $val->status_pesan = "1";
                $val->save();
            }
        \Log::info('Cron kita sudah jalan!');
    }
}
