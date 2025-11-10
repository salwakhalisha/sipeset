<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meminjam;
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    public function index()
    {
        $meminjams = Meminjam::with(['aset', 'pegawai'])->latest()->get();
        return view('admin.konfirmasi.index', compact('meminjams'));
    }

    public function update(Request $request, $id)
    {
        $meminjam = Meminjam::findOrFail($id);
        $meminjam->status = $request->status;
        $meminjam->save();

        return redirect()->route('admin.konfirmasi.index')
            ->with('success', 'Status peminjaman berhasil diperbarui.');
    }
}
