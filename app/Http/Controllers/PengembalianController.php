<?php

namespace App\Http\Controllers;

use App\Models\Meminjam;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function store($id)
    {
        $meminjam = Meminjam::findOrFail($id);

        // Cek apakah sudah dikembalikan
        if ($meminjam->tanggal_kembali) {
            return back()->with('error', 'Aset sudah dikembalikan');
        }

        // Cek apakah peminjaman sudah disetujui
        if ($meminjam->status !== 'disetujui') {
            return back()->with('error', 'Peminjaman belum disetujui');
        }

        // Hitung tanggal kembali dan keterlambatan
        $tanggalKembali = Carbon::today();
        $batasKembali = Carbon::parse($meminjam->batas_kembali);

        $hariTelat = 0;
        if ($tanggalKembali->greaterThan($batasKembali)) {
            $hariTelat = $batasKembali->diffInDays($tanggalKembali);
        }

        // Update peminjaman
        $meminjam->update([
            'tanggal_kembali' => $tanggalKembali,
            'hari_telat'      => $hariTelat,
            'status'          => 'dikembalikan',
        ]);

        // Update status aset jadi tersedia
        $aset = $meminjam->aset; // pastikan relasi aset() ada di model Meminjam
        if ($aset) {
            $aset->status = 'tersedia';
            $aset->save();
        }

        return back()->with('success', 'Pengembalian berhasil');
    }
}
