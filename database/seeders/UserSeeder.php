<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataUser = [
            'name'      => 'Maman Suparman',
            'email'     => 'omenartcorp@gmail.com',
            'password'  => bcrypt('password'),
            'about'     => 'Tentang Saya',
            'perusahaan'=> 'OmenSoftware',
            'job'       => 'Full Stack Web Developer',
            'country'   => 'Indonesia',
            'address'   => 'Ciamis Jawa Barat',
            'phone'     => '082240600070'
        ];
        User::create($dataUser);
    }
}
