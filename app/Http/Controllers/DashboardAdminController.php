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
        $totalDipinjam = Meminjam::where('status', 'disetujui')->count();
        $menungguKonfirmasi = Meminjam::where('status', 'menunggu')->count();

        return view('admin.index', [
            'menu' => 'home',
            'kategoriaset' => $kategoriaset,
            'aset' => $aset,
            'totalDipinjam' => $totalDipinjam,
            'menungguKonfirmasi' => $menungguKonfirmasi,
        ]);
    }

}
