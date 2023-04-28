<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Siswa::query();
    }
    public function headings(): array
    {
        return [
            'nis',
            'nisn',
            'namasiswa',
            'kelasid',
            'statuslulus',
            'suratlulus',
        ];
    }
    public function map($siswa): array
    {
        return [
            $siswa->nis,
            $siswa->nisn,
            $siswa->namasiswa,
            $siswa->kelasid,
            $siswa->statuslulus,
            $siswa->suratlulus
        ];
    }
}
