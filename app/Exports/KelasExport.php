<?php

namespace App\Exports;

use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KelasExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Kelas::query();
    }
   public function headings(): array
   {
        return [
            'idkelas',
            'namakelas'
        ];
   }
   public function map($kelas): array
   {
        return [
            $kelas->id,
            $kelas->namakelas
        ];
   }
}
