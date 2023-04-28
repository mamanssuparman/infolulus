<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.dashboard.index',[
            'title'         => 'Dashboard',
            'header'        => 'Dashboard',
            'breadcrumb1'   => 'Dashboard',
            'breadcrumb2'   => 'Index'
        ]);
    }
    public function getDataJson(Request $request)
    {
        try {
            $dataQuery = Siswa::count();
            // $dataJsonSiswa = $dataQuery->get()->count();
            if($dataQuery){
                $dataSuccess = [
                    'statuscode'    => 200,
                    'jumlahsiswa'          => $dataQuery
                ];
            } else {
                $dataSuccess = [
                    'statuscode'    => 500,
                    'message'          => 'Gagal memuat data'
                ];
            }
           $dataQueryKelas = Kelas::count();
           if($dataQueryKelas){
            $dataSuccessKelas = [
                'statuscode'        => 200,
                'jumlahkelas'         => $dataQueryKelas
            ];
           } else {
            $dataSuccessKelas = [
                'statuscode'        => 500,
                'message'         => $dataQueryKelas
            ];
           }
        return response()->json(['dataSiswa'=> $dataSuccess,'dataKelas'=>$dataSuccessKelas]);
        } catch (\Throwable $th) {
            $messageError = [
                'statuscode'        => 404,
                'data'              => 'Gagal memuat data'
            ];
            return response()->json($messageError);
        }
    }
}
