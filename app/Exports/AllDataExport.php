<?php

namespace App\Exports;

use App\Models\Data;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class AllDataExport implements FromCollection
{
   protected $data;

   public function __construct($data)
   {
       $this->data = $data;
   }

    public function headings():array{
        return[
            'Nama',
            'NIK',
            'Nomor KK',
            'Alamat',
            'RT', 
            'Agama',
            'Jenis Kelamin',
            'Tampat Lahir',
            'Tanggal Lahir',
            'Status Perkawinan',
            'Pekerjaan',
            'Kewarganegaraan'
        ];
    } 
    public function collection()
    {
      return collect($this->data);
    }
}
