<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FingerprintMachine as FP;
use App\MasterUser as MU;
use App\Masterabsen as MA;

class DashboardController extends Controller
{
    public function index(){
        $data['mesin'] = FP::get();
        $data['user'] = MU::get();
        $data['absen'] = MA::get();
        return view('dashboard.index',$data);
    }
}
