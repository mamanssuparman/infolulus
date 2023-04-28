<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\DataSiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index']);

Route::get('/auth',[AuthController::class, 'index']);
Route::post('/auth/check',[AuthController::class, 'check']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::post('/cekData',[UserController::class, 'check']);
Route::post('/downloadFile', [UserController::class, 'download']);
Route::middleware(['admin'])->group(function(){
    Route::get('/dashboard',[DashboardController::class, 'index']);
    Route::post('/dashboard/getDataJson', [DashboardController::class, 'getDataJson']);
    Route::get('/kelas',[DataKelasController::class, 'index']);
    Route::post('/kelas/AddKelas',[DataKelasController::class, 'addkelas']);
    Route::post('/kelas/Hapus',[DataKelasController::class, 'hapus']);
    Route::post('kelas/Ubah',[DataKelasController::class, 'ubahDataKelas']);
    Route::post('kelas/import-data',[DataKelasController::class, 'importDataKelas']);
    Route::get('kelas/export',[DataKelasController::class, 'exportDataKelas']);
    Route::get('/siswa', [DataSiswaController::class, 'index']);
    Route::post('/siswa/import-data',[DataSiswaController::class, 'importDataSiswa']);
    Route::get('/siswa/Add',[DataSiswaController::class, 'addSiswa']);
    Route::post('/siswa/simpan',[DataSiswaController::class, 'simpan']);
    Route::post('/siswa/Hapus',[DataSiswaController::class, 'hapus']);
    Route::get('/siswa/edit/{id}',[DataSiswaController::class, 'edit']);
    Route::post('/siswa/{id}/update',[DataSiswaController::class, 'update']);
    Route::get('/siswa/export', [DataSiswaController::class, 'exportDataSiswa']);
    Route::get('/profile',[ProfileController::class, 'index']);
    Route::post('/profile/getDataJson',[ProfileController::class, 'getDataJson']);
    Route::post('/profile/update',[ProfileController::class, 'update']);
});
Route::post('/getDataKelas',[DataKelasController::class, 'getDataKelas']);
Route::post('/getDataSiswa', [DataSiswaController::class, 'getDataSiswa']);
