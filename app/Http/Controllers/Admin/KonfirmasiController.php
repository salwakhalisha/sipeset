<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonfirmasiController extends Controller
{
    public function index()
    {
        $meminjams = Meminjam::with(['aset', 'pegawai'])->latest()->get();
        $pengembalians = Meminjam::with(['aset', 'pegawai'])
            ->whereNotNull('tanggal_kembali')
            ->orderBy('tanggal_kembali', 'desc')
            ->get();

        return view('admin.konfirmasi.index', [
            'meminjams' => $meminjams,
            'pengembalians' => $pengembalians
        ]);
    }

public function update(Request $request, $id)
{
    DB::transaction(function () use ($request, $id) {

        $meminjam = Meminjam::with('aset')->findOrFail($id);

        // Update status peminjaman
        $meminjam->status = $request->status;
        $meminjam->save();

        // Jika disetujui → aset jadi dipinjam
        if ($request->status == 'disetujui') {
            $meminjam->aset->status = 'dipinjam';
            $meminjam->aset->save();
        }

        // Jika ditolak → pastikan aset tetap tersedia
        if ($request->status == 'ditolak') {
            $meminjam->aset->status = 'tersedia';
            $meminjam->aset->save();
        }
    });

    return redirect()->route('admin.konfirmasi.index')
        ->with('success', 'Status peminjaman & aset berhasil diperbarui.');
}
 
}
