<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\SikapController;
use App\Http\Controllers\AkunController;
use App\Models\Jadwal;
use App\Models\Kelompok;
use App\Models\Tempat;

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

Route::get('ruangan',[RuanganController::class,'index'])->name('ruangan.ruangan');
Route::get('ruangan/tambah',[RuanganController::class,'TambahRuangan'])->name('ruangan.create');
Route::post('ruangan/store',[RuanganController::class,'store'])->name('ruangan.store');
Route::get('ruangan/edit/{id}',[RuanganController::class,'edit'])->name('ruangan.edit');
Route::post('ruangan/update/{id}',[RuanganController::class,'update'])->name('ruangan.update');

Route::get('informasi',[InformasiController::class,'index'])->name('informasi.informasi');
Route::get('informasi/tambah',[InformasiController::class,'TambahInformasi'])->name('informasi.create');
Route::post('informasi/store',[InformasiController::class,'store'])->name('informasi.store');
Route::get('informasi/edit/{id}',[InformasiController::class,'edit'])->name('informasi.edit');
Route::post('informasi/update/{id}',[InformasiController::class,'update'])->name('informasi.update');

Route::get('jadwal',[JadwalController::class,'index'])->name('jadwal.jadwal');
Route::get('jadwal/tambah',[JadwalController::class,'TambahJadwal'])->name('jadwal.create');
Route::post('jadwal/store',[JadwalController::class,'store'])->name('jadwal.store');
Route::get('jadwal/edit/{id}',[JadwalController::class,'edit'])->name('jadwal.edit');
Route::post('jadwal/update/{id}',[JadwalController::class,'update'])->name('jadwal.update');


Route::get('kelompok',[KelompokController::class,'index'])->name('kelompok.kelompok');
Route::get('kelompok/tambah',[KelompokController::class,'TambahKelompok'])->name('kelompok.create');
Route::post('kelompok/store',[KelompokController::class,'store'])->name('kelompok.store');
Route::get('kelompok/edit/{id}',[KelompokController::class,'edit'])->name('kelompok.edit');
Route::post('kelompok/update/{id}',[KelompokController::class,'update'])->name('kelompok.update');


Route::get('sikap',[SikapController::class,'index'])->name('sikap.sikap');
Route::get('sikap/tambah',[SikapController::class,'TambahSikap'])->name('sikap.create');
Route::post('sikap/store',[SikapController::class,'store'])->name('sikap.store');
Route::get('sikap/edit/{id}',[SikapController::class,'edit'])->name('sikap.edit');
Route::post('sikap/update/{id}',[SikapController::class,'update'])->name('sikap.update');