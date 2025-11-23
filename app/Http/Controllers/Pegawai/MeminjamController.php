<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Meminjam;
use App\Models\Aset;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeminjamController extends Controller
{
    public function index()
{
    $pegawai = Pegawai::where('user_id', Auth::id())->first();

    $meminjams = Meminjam::with(['aset'])
        ->where('pegawai_id', $pegawai->id)
        ->latest()
        ->get();

    // Tambahkan ini supaya $asets tersedia di view
    $asets = Aset::all();

    return view('pegawai.meminjam.index', compact('meminjams', 'asets'));
}

    public function create()
    {
        $asets = Aset::all();
        return view('pegawai.meminjam.create', compact('asets'));
    }

    public function store(Request $request)
    {
        $pegawai = Pegawai::where('user_id', Auth::id())->first();

        $request->validate([
            'aset_id' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
        ]);

        Meminjam::create([
            'aset_id' => $request->aset_id,
            'pegawai_id' => $pegawai->id,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'status' => 'menunggu',
        ]);

        return redirect()->route('pegawai.meminjam.index')
            ->with('success', 'Peminjaman berhasil diajukan, menunggu konfirmasi admin.');
    }
}
