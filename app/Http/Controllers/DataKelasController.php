<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataKelasController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.datakelas.index',[
            'title'         => 'Data Kelas | Index',
            'header'        => 'Data Kelas',
            'breadcrumb1'   => 'Data Kelas',
            'breadcrumb2'   => 'Index'
        ]);
    }
}
