<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.datasiswa.index',[
            'title'         => 'Data Siswa | Index',
            'header'        => 'Data Siswa',
            'breadcrumb1'   => 'Data Siswa',
            'breadcrumb2'   => 'Index'
        ]);
    }
}
