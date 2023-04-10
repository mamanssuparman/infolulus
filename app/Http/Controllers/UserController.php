<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('users');
    }
    public function check(Request $request)
    {
        try {
            $request->validate([
                'nisn'      => 'required'
            ]);
            $search = Siswa::where('nisn', $request->nisn)->first();
            if($search){
                $jsonData = [
                    'statusCode'    => 200,
                    'data'          => $search
                ];
                return response()->json($jsonData);
            } else {
                $jsonData = [
                    'statusCode'    => 404,
                    'data'          => 'Data not found'
                ];
                return response()->json($jsonData);
            }
        } catch (\Throwable $th) {
            $jsonData = [
                'statusCode'    => 500,
                'data'          => 'errors'
            ];
        }
    }
    public function download(Request $request)
    {
        try {
            // $request->validate([
            //     'nisn'      => $request->nisn
            // ]);
            // $searchFileDownload = Siswa::where('nisn',$request->nisn)->first();
            // $fileDownload = Storage::download('surat-lulus/'.$searchFileDownload->suratlulus);
            $fileDownload = Siswa::where('nisn',$request->nisn)->first();
            // foreach ($fileDownload as $file) {
                $files = asset('surat-lulus/'.$fileDownload->suratlulus);
                // File::download($file);
                $response = response()->make($files);
                $response->header('Content-Type', $files->mime_type);
                $response->header('Content-Disposition','Attachment; filename="'.$file->suratlulus.'"');
                return $response;
                // $headers = response 'Content-type',$file->mime_type;
                // return response()->download($file);
            // }
            // $fileNya = public_path('surat-lulus/'.$fileDownload->suratlulus);

            // $response = response()->make($fileNya);
            // $response->header('Content-Type', $fileNya->mime_type);
            // $response->header('Content-Disposition','Attachment; filename="'.$fileNya.'"');
            // return $response;
            $statusJson = [
                'statusCode'        => 200,
                'data'              => $response
            ];
            return response()->json($statusJson);
        } catch (\Throwable $th) {
            // return response()->json($th->errors());
            $statusJson = [
                'statusCode'        => 500,
                'data'              => 'Errors'
            ];
            return response()->json($statusJson);
        }
    }
}
