<?php

namespace App\Exports;

use App\Masterabsen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AbsenExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Masterabsen::join('master_users', 'masterabsens.user_id', '=', 'master_users.user_id')
                ->select('masterabsens.id','masterabsens.user_id','masterabsens.datetime', 'master_users.username','master_users.no_hp')
                ->orderBy('datetime','DESC')
                ->paginate(1000);
        // return Masterabsen::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'ID USER',
            'WAKTU HADIR',
            'Username',
            'No HP'
        ];
    }
}
