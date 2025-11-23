<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PegawaiPasswordController extends Controller
{
    // Menampilkan form ubah password
    public function edit()
    {
        $pegawai = Auth::user()->pegawai;
        $passwordLama = $pegawai->password ? Crypt::decryptString($pegawai->password) : '';
        return view('pegawai.password', compact('pegawai', 'passwordLama'));
    }

    // Memproses update password
    public function update(Request $request)
    {
        $pegawai = Auth::user()->pegawai;

        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);

        $pegawai->password = Crypt::encryptString($request->new_password);

        if ($pegawai->user) {
            $pegawai->user->password = Crypt::encryptString($request->new_password);
            $pegawai->user->save();
        }

        $pegawai->save();

        return back()->with('success', 'Password berhasil diubah.');
    }
}
