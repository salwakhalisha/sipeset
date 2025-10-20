<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitkerjaController;

// Route::get('/', function () {
//     return view('utama.welcome');
// });


Route::get('/dashboardadmin', [DashboardController::class, 'dashboard'])->name('dashboard.admin');
Route::get('/index', [DashboardController::class, 'dashboard'])->name('index');

Route::view('/', 'utama.index');

Route::post('/login', [LoginController::class, 'authenticate'])->name('auth');
Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
Route::get('/jabatan/create', [JabatanController::class, 'create'])->name('jabatan.create');
Route::post('/jabatan', [JabatanController::class, 'store'])->name('jabatan.store');
Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit'])->name('jabatan.edit');
Route::put('/jabatan/update', [JabatanController::class, 'update'])->name('jabatan.update');
Route::delete('/jabatan/delete/{id}', [JabatanController::class, 'destroy'])->name('jabatan.delete');  

Route::get('/unitkerja', [UnitkerjaController::class, 'index'])->name('unitkerja.index');
Route::get('/unitkerja/create', [UnitkerjaController::class, 'create'])->name('unitkerja.create');
Route::post('/unitkerja', [UnitkerjaController::class, 'store'])->name('unitkerja.store');
Route::get('/unitkerja/edit/{id}', [UnitkerjaController::class, 'edit'])->name('unitkerja.edit');
Route::put('/unitkerja/update', [UnitkerjaController::class, 'update'])->name('unitkerja.update');
Route::delete('/unitkerja/delete/{id}', [UnitkerjaController::class, 'destroy'])->name('unitkerja.delete');
 
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');

Route::get('/aset', [AsetController::class, 'index'])->name('aset.index');
Route::get('/aset/create', [AsetController::class, 'create'])->name('aset.create');
Route::post('/aset', [AsetController::class, 'store'])->name('aset.store');
Route::get('/aset/{aset}/edit', [AsetController::class, 'edit'])->name('aset.edit');
Route::put('/aset/{aset}', [AsetController::class, 'update'])->name('aset.update');
Route::delete('/aset/{aset}', [AsetController::class, 'destroy'])->name('aset.delete');

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.delete');
