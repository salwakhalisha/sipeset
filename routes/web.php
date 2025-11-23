<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UnitkerjaController;
use App\Http\Controllers\MengembalikanController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\PegawaiPasswordController;
use App\Http\Controllers\Admin\KonfirmasiController;
use App\Http\Controllers\DashboardPegawaiController;
use App\Http\Controllers\Pegawai\MeminjamController;

Route::get('/dashboardadmin', [DashboardAdminController::class, 'dashboard'])->name('dashboard.admin');
Route::get('/index', [DashboardAdminController::class, 'dashboard'])->name('index');

Route::get('/dashboardpegawai', [DashboardPegawaiController::class, 'dashboard'])->name('dashboard.pegawai');
Route::get('/index', [DashboardPegawaiController::class, 'dashboard'])->name('index');
Route::get('/pegawai/dashboard', [DashboardPegawaiController::class, 'index'])->name('pegawai.dashboard');

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
Route::get('/pegawai/{pegawai}', [PegawaiController::class, 'show'])->name('pegawai.show');

Route::middleware('auth')->group(function() {
    Route::get('/pegawai/password', [PegawaiPasswordController::class, 'edit'])
        ->name('pegawai.edit_password');
    Route::put('/pegawai/password', [PegawaiPasswordController::class, 'update'])
        ->name('pegawai.update_password');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('pegawai.profile');
});


Route::middleware(['auth'])->group(function () {
    // Pegawai
    Route::get('/meminjam', [MeminjamController::class, 'index'])->name('pegawai.meminjam.index');
    Route::get('/meminjam/create', [MeminjamController::class, 'create'])->name('pegawai.meminjam.create');
    Route::post('/meminjam', [MeminjamController::class, 'store'])->name('pegawai.meminjam.store');

    Route::get('/konfirmasi', [KonfirmasiController::class, 'index'])->name('admin.konfirmasi.index');
    Route::put('/konfirmasi/{id}', [KonfirmasiController::class, 'update'])->name('admin.konfirmasi.update');
});

Route::get('aset/export/excel', [AsetController::class, 'exportExcel'])->name('aset.export.excel');
Route::get('aset/export/pdf', [AsetController::class, 'exportPDF'])->name('aset.export.pdf');
Route::get('/aset/filter', [AsetController::class, 'filter'])->name('aset.filter');

Route::get('/mengembalikan', [MengembalikanController::class, 'index'])->name('mengembalikan.index');
Route::get('/mengembalikan/create', [MengembalikanController::class, 'create'])->name('mengembalikan.create');
Route::post('/mengembalikan', [MengembalikanController::class, 'store'])->name('mengembalikan.store');
Route::get('/mengembalikan/{mengembalikan}/edit', [MengembalikanController::class, 'edit'])->name('mengembalikan.edit');
Route::put('/mengembalikan/{mengembalikan}', [MengembalikanController::class, 'update'])->name('mengembalikan.update');
Route::delete('/mengembalikan/{mengembalikan}', [MengembalikanController::class, 'destroy'])->name('mengembalikan.destroy');