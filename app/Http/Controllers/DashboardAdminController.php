<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\kategori;
use App\Models\Meminjam;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function dashboard()
    {
        $kategoriaset = kategori::count();
        $aset = aset::count();
        $meminjam = Meminjam::count();

        $jumlahKonfirmasi = Meminjam::where('status', 'pending')->count();

        return view('admin.index', [
            'menu' => 'home',
            'kategoriaset' => $kategoriaset,
            'aset' => $aset,
            'meminjam' => $meminjam,
            'jumlahKonfirmasi' => $jumlahKonfirmasi, 
        ]);
    }

}
