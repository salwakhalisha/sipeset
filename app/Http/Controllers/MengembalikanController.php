<?php

namespace App\Http\Controllers;

use App\Models\Meminjam;
use Illuminate\Support\Facades\Auth;

class MengembalikanController extends Controller
{
    public function index()
    {
        $pegawaiId = Auth::user()->pegawai->id;

        $pengembalians = Meminjam::with(['aset', 'pegawai'])
            ->whereNotNull('tanggal_kembali')
            ->where('pegawai_id', $pegawaiId)
            ->orderBy('tanggal_kembali', 'desc')
            ->get();

        return view('pegawai.mengembalikan.index', compact('pengembalians') + [
            'menu' => 'mengembalikan'
        ]);
    }

}
