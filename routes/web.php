<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth', function(){
    return view('loginadmin');
});

Route::get('/dashboard',[DashboardController::class, 'index']);
Route::get('/kelas',[DataKelasController::class, 'index']);
Route::get('/siswa', [DataSiswaController::class, 'index']);
Route::get('/profile',[ProfileController::class, 'index']);
