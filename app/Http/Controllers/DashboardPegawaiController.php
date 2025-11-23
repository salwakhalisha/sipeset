<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meminjam;
use App\Models\Mengembalikan;

class DashboardPegawaiController extends Controller
{
    public function dashboard()
    {
        $totalDipinjam = Meminjam::where('status', 'disetujui')->count();
        $totalDikembalikan = Mengembalikan::count();
        $menungguKonfirmasi = Meminjam::where('status', 'menunggu')->count();
        $jumlahDitolak = Meminjam::where('status', 'ditolak')->count();

        return view('pegawai.index', [
            'menu' => 'home',
            'totalDipinjam' => $totalDipinjam,
            'totalDikembalikan' => $totalDikembalikan,
            'menungguKonfirmasi' => $menungguKonfirmasi,
            'jumlahDitolak' => $jumlahDitolak
        ]);
    }
}
