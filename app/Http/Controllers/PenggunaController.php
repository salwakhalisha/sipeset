<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\lokal;
use App\Models\pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    { 
        $datapengguna = Pengguna::all();
        return view('admin.pengguna.index', [
            "menu" => "pengguna",
            'title' => 'Data pengguna',
            'datapengguna' => $datapengguna
        ]);
    }

    public function create()
    {
        $lokal = lokal::all();
        return view('admin.pengguna.create', [
            'menu' => 'pengguna',
            'title' => 'Tambah Data pengguna',
            'lokal' => $lokal
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'jk' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_id' => 'nullable',
            'jabatan_id' => 'nullable'
        ], [
            'nisn.required' => 'nisn Harus Diisi',
            'nama.required' => 'Nama Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'telp.required' => 'Nomor HP Harus Diisi',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);
        
        $user = new User();
        $user->name = 'pengguna';
        $user->username = $validasi['username'];
        $user->email = $validasi['email'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'pengguna';
        $user->save();


        $pengguna = new Pengguna;
        $pengguna->nisn = $validasi['nisn'];
        $pengguna->nama = $validasi['nama'];
        $pengguna->alamat = $validasi['alamat'];
        $pengguna->telp = $validasi['telp'];
        $pengguna->jk = $validasi['jk'];
        $pengguna->username = $validasi['username'];
        $pengguna->password = bcrypt($validasi['password']);
        $pengguna->user_id = $user->id;
        $pengguna->jabatan_id = $validasi['jabatan_id'];
        $pengguna->save();
        return redirect(route('pengguna.index'));
    }

    public function show($id)
    {
        $pengguna = Pengguna::find($id);
        return view('admin.pengguna.view', [
            'menu' => 'pengguna',
            'title' => 'Detail Data pengguna',
            'pengguna' => $pengguna
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $pengguna = pengguna::with('lokal')->find($id);
        $lokal = lokal::all();
        return view('admin.pengguna.edit', [
            'menu' => 'pengguna',
            'title' => 'Edit Data pengguna',
            'pengguna' => $pengguna,
            'lokal' => $lokal
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nisn' => 'nullable',
            'nama' => 'nullable',
            'alamat' => 'required',
            'telp' => 'nullable',
            'jk' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'user_id' => 'nullable',
            'jabatan_id' => 'nullable'
        ]);


        $pengguna = pengguna::find($id);
        if (!$pengguna) {
            return redirect(route('pengguna.index'))->with('error', 'pengguna not found.');
        }
        $pengguna->nisn = $validasi['nisn'] ?? $pengguna->nisn;
        $pengguna->nama = $validasi['nama'] ?? $pengguna->nama;
        $pengguna->alamat = $validasi['alamat'] ?? $pengguna->alamat;
        $pengguna->telp = $validasi['telp'] ?? $pengguna->telp;
        $pengguna->jk = $validasi['jk'] ?? $pengguna->jk;
        $pengguna->username = $validasi['username'] ?? $pengguna->username;
        if ($request->filled('password')) {
            $pengguna->password = $validasi['password'];
        }
        $pengguna->user_id = $validasi['user_id'] ?? $pengguna->user_id;
        $pengguna->jabatan_id = $validasi['jabatan_id'] ?? $pengguna->jabatan_id;
        $pengguna->save();

        return redirect(route('pengguna.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengguna = pengguna::find($id);
        $pengguna->delete();
        return redirect(route('pengguna.index'));
    }
}



