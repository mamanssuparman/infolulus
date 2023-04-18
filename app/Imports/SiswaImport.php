<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nis'           => $row['nis'],
            'nisn'          => $row['nisn'],
            'namasiswa'     => $row['namasiswa'],
            'kelasid'       => $row['kelasid'],
            'statuslulus'   => $row['statuslulus'],
            'suratlulus'    => $row['suratlulus']
        ]);
    }
}
