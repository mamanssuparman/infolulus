<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.profile.index',[
            'title'         => 'Profile | Index',
            'header'        => 'Profile',
            'breadcrumb1'   => 'Profile',
            'breadcrumb2'   => 'Index'
        ]);
    }
    public function getDataJson(Request $request)
    {
        try {
            $accountId = auth()->user()->id;
            $getData = User::where('id', $accountId)->first();
            if($getData){
                $dataJson = [
                    'statuscode'        => 200,
                    'data'              => $getData
                ];
            } else {
                $dataJson = [
                    'statuscode'        => 500,
                    'data'              => 'Data tidak ditemukan.!'
                ];
            }
            return response()->json($dataJson);
        } catch (\Throwable $th) {
            $dataJson = [
                'statuscode'            => 404,
                'data'                  => 'Data cannot be access.!'
            ];
            return response()->json($dataJson);
        }
    }
    public function update(Request $request)
    {
        try {
            $request->validate([
                'fullName'      => 'required',
                'about'         => 'required',
                'company'       => 'required',
                'Job'           => 'required',
                'Country'       => 'required',
                'Address'       => 'required',
                'Phone'         => 'required',
            ]);
            $dataUpdate = [
                'name'          => $request->fullName,
                'about'         => $request->about,
                'perusahaan'    => $request->company,
                'job'           => $request->Job,
                'country'       => $request->Country,
                'address'       => $request->Address,
                'phone'         => $request->Phone
            ];
            $exec = User::where('id', auth()->user()->id)->update($dataUpdate);
            if($exec){
                $jsonReponse = [
                    'statuscode'        => 200,
                    'message'           => 'Data Success Update'
                ];
            }
            return response()->json($jsonReponse);
        } catch (\Throwable $th) {
            $jsonReponseErrors = [
                'statuscode'            => 500,
                'message'               => $th->errors()
            ];
            return response()->json($jsonReponseErrors);
        }
    }
}
