<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Unitkerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::with(['user', 'jabatan', 'unitkerja'])->get();
        return view('admin.pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $jabatans = Jabatan::all();
        $unitkerjas = Unitkerja::all();

        return view('admin.pegawai.create', compact('users', 'jabatans', 'unitkerjas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'jk' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'user_id' => 'nullable',
            'jabatan_id' => 'nullable',
            'unitkerja_id' => 'nullable',
        ], [
            'nip.required' => 'NIP Harus Diisi',
            'nama.required' => 'Nama Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'telp.required' => 'Nomor HP Harus Diisi',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'email.required' => 'Email Harus Diisi',
        ]);

        $user = new User();
        $user->name = 'pegawai';
        $user->username = $validasi['username'];
        $user->email = $validasi['email'];
        $user->password = bcrypt($validasi['password']);
        $user->role = 'pegawai';
        $user->save();  

        $pegawai = new Pegawai;
        $pegawai->nip = $validasi['nip'];
        $pegawai->nama = $validasi['nama'];
        $pegawai->alamat = $validasi['alamat'];
        $pegawai->telp = $validasi['telp'];
        $pegawai->jk = $validasi['jk'];
        $pegawai->username = $validasi['username'];
        $pegawai->password = Hash::make($validasi['password']);
        $pegawai->user_id = $user->id;
        $pegawai->jabatan_id = $validasi['jabatan_id'];
        $pegawai->unitkerja_id = $validasi['unitkerja_id'];
        $pegawai->save();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view('admin.pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        $users = User::all();
        $jabatans = Jabatan::all();
        $unitkerjas = Unitkerja::all();

        return view('admin.pegawai.edit', compact('pegawai', 'users', 'jabatans', 'unitkerjas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nip' => 'nullable',
            'nama' => 'nullable',
            'alamat' => 'nullable',
            'telp' => 'nullable',
            'jk' => 'nullable',
            'jabatan_id' => 'nullable',
            'unitkerja_id' => 'nullable',
            // username, password, email tidak perlu divalidasi
        ]);

        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->alamat = $request->alamat;
        $pegawai->telp = $request->telp;
        $pegawai->jk = $request->jk;

        // username, password, email sengaja tidak diubah
        // jadi kolom di DB tetap seperti sebelumnya

        $pegawai->jabatan_id = $request->jabatan_id;
        $pegawai->unitkerja_id = $request->unitkerja_id;

        $pegawai->save();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
