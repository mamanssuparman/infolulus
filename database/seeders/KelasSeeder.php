<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = [
            'namakelas'     => 'XII RPL 1'
        ];
        Kelas::create($data1);
        $data2 = [
            'namakelas'     => 'XII RPL 2'
        ];
        Kelas::create($data2);
    }
}
