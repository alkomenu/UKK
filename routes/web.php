<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;

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

// Route::resources([
//     'masyarakat' => MasyarakatController::class,
// ]);
Route::get('login', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'authanticate']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('masyarakat/add', [MasyarakatController::class, 'create']);
Route::get('masyarakat/edit/{id}', [MasyarakatController::class, 'edit']);
Route::get('masyarakat', [MasyarakatController::class, 'index']);
Route::post('masyarakat/store', [MasyarakatController::class, 'store']);
Route::get('masyarakat/delete/{id}', [MasyarakatController::class, 'destroy']);
Route::put('masyarakat/update/{id}', [MasyarakatController::class, 'update']);

Route::get('petugas/add', [PetugasController::class, 'create']);
Route::get('petugas/edit/{id}', [PetugasController::class, 'edit']);
Route::get('petugas', [PetugasController::class, 'index']);
Route::post('petugas/store', [PetugasController::class, 'store']);
Route::get('petugas/delete/{id}', [PetugasController::class, 'destroy']);
Route::put('petugas/update/{id}', [PetugasController::class, 'update']);

Route::get('pengaduan/add', [PengaduanController::class, 'create']);
Route::get('pengaduan/edit/{id}', [PengaduanController::class, 'edit']);
Route::get('/home', [PengaduanController::class, 'index']);
Route::get('/pengaduanku', [PengaduanController::class, 'pengaduanku']);
Route::get('/pengaduan/detail/{id}', [PengaduanController::class, 'show']);
Route::post('pengaduan/store', [PengaduanController::class, 'store']);
Route::get('pengaduan/delete/{id}', [PengaduanController::class, 'destroy']);
Route::put('pengaduan/update/{id}', [PengaduanController::class, 'update']);

Route::get('tanggapan/add/{id_pengaduan}', [TanggapanController::class, 'create']);
Route::get('tanggapan/edit/{id}', [TanggapanController::class, 'edit']);
Route::get('/tanggapan/detail/{id}', [TanggapanController::class, 'show']);
Route::post('tanggapan/store/{id_pengaduan}', [TanggapanController::class, 'store']);
Route::get('tanggapan/verif/{id_pengaduan}', [TanggapanController::class, 'verif']);
Route::get('tanggapan/delete/{id}', [TanggapanController::class, 'destroy']);
Route::put('tanggapan/update/{id}', [TanggapanController::class, 'update']);

Route::get('/', function () {
    return view('resource.landing');
});
