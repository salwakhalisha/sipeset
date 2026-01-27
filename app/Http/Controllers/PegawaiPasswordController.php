<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PegawaiPasswordController extends Controller
{
    // Menampilkan halaman ubah password
    public function index()
    {
        $pegawai = Auth::user()->pegawai;

        if (!$pegawai) {
            abort(404, 'Data pegawai tidak ditemukan');
        }

        // Jangan decrypt password lama untuk alasan keamanan
        $passwordLama = '';

        return view('pegawai.password', compact('pegawai', 'passwordLama'));
    }

    // Memproses update password
    public function update(Request $request)
    {
        $pegawai = Auth::user()->pegawai;

        if (!$pegawai) {
            abort(404, 'Data pegawai tidak ditemukan');
        }

        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);

        $encryptedPassword = Crypt::encryptString($request->new_password);

        $pegawai->password = $encryptedPassword;

        if ($pegawai->user) {
            $pegawai->user->password = $encryptedPassword;
            $pegawai->user->save();
        }

        $pegawai->save();

        return back()->with('success', 'Password berhasil diubah.');
    }
}
