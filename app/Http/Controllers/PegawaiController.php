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
        $request->validate([
            'nip' => 'required|string|max:20',
            'nama' => 'required|string|max:30',
            'alamat' => 'required|string',
            'telp' => 'required|string|max:15',
            'jk' => 'required|in:L,P',
            'username' => 'required|string|max:30',
            'password' => 'required|string|min:6',
            'user_id' => 'required|exists:users,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'unitkerja_id' => 'required|exists:unitkerjas,id',
        ]);

        Pegawai::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'jk' => $request->jk,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'user_id' => $request->user_id,
            'jabatan_id' => $request->jabatan_id,
            'unitkerja_id' => $request->unitkerja_id,
        ]);

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
            'nip' => 'required|string|max:20',
            'nama' => 'required|string|max:30',
            'alamat' => 'required|string',
            'telp' => 'required|string|max:15',
            'jk' => 'required|in:L,P',
            'username' => 'required|string|max:30',
            'password' => 'nullable|string|min:6',
            'user_id' => 'required|exists:users,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'unitkerja_id' => 'required|exists:unitkerjas,id',
        ]);

        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->alamat = $request->alamat;
        $pegawai->telp = $request->telp;
        $pegawai->jk = $request->jk;
        $pegawai->username = $request->username;

        if ($request->filled('password')) {
            $pegawai->password = Hash::make($request->password);
        }

        $pegawai->user_id = $request->user_id;
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
