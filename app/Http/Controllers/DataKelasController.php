<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Exports\KelasExport;
use App\Imports\KelasImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DataKelasController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.datakelas.index',[
            'title'         => 'Data Kelas | Index',
            'header'        => 'Data Kelas',
            'breadcrumb1'   => 'Data Kelas',
            'breadcrumb2'   => 'Index',
        ]);
    }
    public function getDataKelas(Request $request)
    {
        $orderBy = 'id';
        switch ($request->input('order.0.column')) {
            case '0': //untuk inisialisasi data kolom
                $orderBy = 'id';
                break;
            case '1':
                $orderBy = 'namakelas';
                break;
        }
        // // Get Data Nya
        $data = Kelas::withCount('siswa');
        // Function filter dari inputan search
        // if($request->input('search.value')!= null){
        //     $data = $data->where(function($q)use($request){
        //         $q->whereRaw('LOWER(namakelas) like ?',['%'.$request->input('search.value').'%'])
        //         ->orWhereRaw('LOWER(siswa_count) like ?',['%'.$request->input('search.value').'%']);
        //     });
        // }

        $recordsFiltered = $data->get()->count(); //menampilkan jumlah Isi Record yang terfilter
        if($request->input('length')!= -1)$data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy, $request->input('order.0.dir'))->get();
        $recordsTotal = $data->count(); //menampilkan jumlah seluruh data
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal'  => $recordsTotal,
            'recordsFiltered'   => $recordsFiltered,
            'data'  => $data
        ]);
    }
    public function addkelas(Request $request)
    {
       try {
            $validasi = $request->validate([
                'namakelas'     => 'required|unique:kelas,namakelas'
            ]);
            Kelas::create($validasi);
            $dataSuccess = [
                'statuscode'    => 200,
                'data'          => 'Data berhasil di simpan'
            ];
            return response()->json(['jsonData'=> $dataSuccess]);
       } catch (\Throwable $th) {
            $dataError = [
                'statuscode'    => 500,
                'data'          => $th->errors()
            ];
            return response()->json(['jsonData'=> $dataError]);
       }
    }
    public function hapus(Request $request)
    {
        try {
            $validasi = $request->validate([
                'id'        => 'required'
            ]);
            $prosHapus = Kelas::where('id',$request->id)->delete();
            if($prosHapus){
                $dataSuccess = [
                    'statuscode'    => 200,
                    'data'          => 'Data berhasil di hapus'
                ];
            } else {
                $dataSuccess = [
                    'statuscode'    => 404,
                    'data'          => 'Data gagal di hapus.!'
                ];
            }
            return response()->json(['jsonData'=> $dataSuccess]);
        } catch (\Throwable $th) {
            $dataError = [
                'statuscode'    => 500,
                'data'          => $th->errors()
            ];
            return response()->json(['jsonData'=> $dataError]);
        }
    }
    public function ubahDataKelas(Request $request)
    {
        try {
            $validasi = $request->validate([
                'id'            => 'required',
                'namakelas'     => 'required',
                'namaKelas'     => 'required|unique:kelas,namakelas'
            ]);
            $dataUbah = [
                'namakelas'     => $request->namaKelas
            ];
            Kelas::where('id', $request->id)->update($dataUbah);
            $dataSuccess = [
                'statuscode'    => 200,
                'data'          => 'Data berhasil di ubah'
            ];
            return response()->json(['jsonData'=> $dataSuccess]);
        } catch (\Throwable $th) {
            $dataError = [
                'statuscode'    => 500,
                'data'          => $th->errors()
            ];
            return response()->json(['jsonData'=> $dataError]);
        }
    }
    public function importDataKelas(Request $request)
    {
        $file = $request->importexcel;
        Excel::import(new KelasImport, $file);
        return redirect('/kelas')->with('success', 'Data berhasil di import');
        dd($file);
    }
    public function exportDataKelas(Request $request)
    {
        $kelas = Kelas::all();
        return Excel::download(new KelasExport($kelas), 'data-kelas.xlsx');
    }
}
