<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

  
    public function index()
    {
        $user = Auth::user();

        $pegawai = Pegawai::with(['jabatan', 'unitkerja', 'user'])
            ->where('user_id', $user->id)
            ->first();

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Data pegawai tidak ditemukan.');
        }

        $username = $pegawai->user->username ?? null;

        return view('pegawai.profile', compact('pegawai', 'username'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();


        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);


        // $user->username = $validated['username'];
        // if (!empty($validated['password'])) {
        //     $user->password = Hash::make($validated['password']);
        // }
        // $user->save();


        $pegawai = Pegawai::where('user_id', $user->id)->first();
        if ($pegawai) {
            $pegawai->nama = $validated['nama'];
            $pegawai->no_telp = $validated['no_telp'] ?? $pegawai->no_telp;
            $pegawai->alamat = $validated['alamat'] ?? $pegawai->alamat;
            $pegawai->save();
        }

        return redirect()->route('pegawai.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
