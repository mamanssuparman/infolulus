<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

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
    public function getDataSiswa(Request $request)
    {
        $orderBy = 'id';
        switch ($request->input('order.0.column')) {
            case '0': //untuk inisialisasi data kolom
                $orderBy = 'id';
                break;
            case '1':
                $orderBy = 'nisn';
                break;
            case '2':
                $orderBy = 'namasiswa';
                break;
            case '3':
                $orderBy = 'kelas.namakelas';
                break;
            case '4':
                $orderBy = 'suratlulus';
                break;
        }
        // // Get Data Nya
        $data = Siswa::with(['kelas']);
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
    public function addSiswa(Request $request)
    {
        return view('pages.datasiswa.add',[
            'title'         => 'Data Siswa | Add',
            'header'        => 'Data Siswa',
            'breadcrumb1'   => 'Data Siswa',
            'breadcrumb2'   => 'Add',
            'dataKelas'     => Kelas::all()
        ]);
    }
    public function simpan(Request $request)
    {
        $validasiData = $request->validate([
            'nis'           => 'required|unique:siswas,nis',
            'nisn'          => 'required|unique:siswas,nisn',
            'namasiswa'     => 'required',
            'kelasid'       => 'required',
            'statuslulus'   => 'required',
            'suratlulus'    => 'required'
        ]);
        $files = $request->file('suratlulus');
        if($request->hasFile('suratlulus')){
            $extensi        = $files->getClientOriginalExtension();
            $fileName       = 'surat-'.time().'.'.$extensi;
            $files->move('surat-lulus', $fileName);
            $dataSimpan = [
                'nis'           => $request->nis,
                'nisn'          => $request->nisn,
                'namasiswa'     => $request->namasiswa,
                'kelasid'       => $request->kelasid,
                'statuslulus'   => $request->statuslulus,
                'suratlulus'    => $fileName
            ];
            Siswa::create($dataSimpan);
            return redirect('/siswa')->with('success', 'Data siswa berhasil di simpan');
        }
        return redirect('/siswa')->with('gagal', 'Data siswa gagal di simpan');
    }
    public function hapus(Request $request)
    {
        try {
            $request->validate([
                'dataId'        => 'required'
            ]);
            $dataId = Siswa::where('id', $request->dataId)->get();
            foreach ($dataId as $fileData) {
                $file = public_path('surat-lulus/'.$fileData->suratlulus);
                File::delete($file);
            }
            Siswa::where('id', $request->dataId)->delete();
            $jsonData = [
                'statusCode'        => 200,
                'message'           => 'Data berhasil di hapus.!'
            ];
            return response()->json($jsonData);
        } catch (\Throwable $th) {
            $jsonData = [
                'statusCode'        => 500,
                'message'           => $th->errors()
            ];
            return response()->json($jsonData);
        }
    }
    public function edit(Request $request, $id)
    {
        return view('pages.datasiswa.edit',[
            'title'         => 'Data Siswa | Edit',
            'header'        => 'Data Siswa',
            'breadcrumb1'   => 'Data Siswa',
            'breadcrumb2'   => 'Edit',
            'dataKelas'     => Kelas::all(),
            'dataSiswa'     => Siswa::where('id', base64_decode($id))->first()
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis'           => 'required',
            'nisn'          => 'required',
            'namasiswa'     => 'required',
            'kelasid'       => 'required',
            'statuslulus'   => 'required',
        ]);
        $files = $request->file('suratlulus');
        if($request->hasFile('suratlulus')){
            $dataFileOld = Siswa::where('id',Crypt::decrypt($request->id))->get();
            foreach ($dataFileOld as $fileOld) {
                $filesOld = public_path('surat-lulus/'.$fileOld->suratlulus);
                File::delete($filesOld);
            }
            $extensi        = $files->getClientOriginalExtension();
            $fileName       = 'surat-'.time().'.'.$extensi;
            $dataUpdateWithFile = [
                'nis'           => $request->nis,
                'nisn'          => $request->nisn,
                'namasiswa'     => $request->namasiswa,
                'kelasid'       => $request->kelasid,
                'statuslulus'   => $request->statuslulus,
                'suratlulus'    => $fileName
            ];
            $files->move('surat-lulus', $fileName);
            Siswa::where('id', Crypt::decrypt($request->id))->update($dataUpdateWithFile);
            return redirect('/siswa')->with('success','Data siswa berhasil di perbaharui');
        } else {
            $dataUpdate = [
                'nis'           => $request->nis,
                'nisn'          => $request->nisn,
                'namasiswa'     => $request->namasiswa,
                'kelasid'       => $request->kelasid,
                'statuslulus'   => $request->statuslulus,
            ];
            Siswa::where('id', Crypt::decrypt($request->id))->update($dataUpdate);
            return redirect('/siswa')->with('success', 'Data siswa berhasil di perbaharui');
        }
    }
}
