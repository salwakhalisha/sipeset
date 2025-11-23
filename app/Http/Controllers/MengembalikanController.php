<?php

namespace App\Http\Controllers;

use App\Models\Mengembalikan;
use App\Models\Meminjam;
use Illuminate\Http\Request;

class MengembalikanController extends Controller
{
    public function index()
    {

         $meminjams = Meminjam::where('status', 'disetujui')->get();
        $mengembalikans = Mengembalikan::with('meminjam')->latest()->get();

        return view('pegawai.mengembalikan.index', compact('mengembalikans', 'meminjams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'meminjam_id' => 'required|exists:meminjams,id',
            'tanggal' => 'required|date',
            'kondisi' => 'required|in:baik,rusak ringan,rusak berat,hilang',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Mengembalikan::create([
            'meminjam_id' => $request->meminjam_id,
            'tanggal' => $request->tanggal,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('mengembalikan.index')
                         ->with('success', 'Data pengembalian berhasil ditambahkan!');
    }

    public function destroy(Mengembalikan $mengembalikan)
    {
        $mengembalikan->delete();

        return redirect()->route('mengembalikan.index')
                         ->with('success', 'Data pengembalian berhasil dihapus.');
    }
}
