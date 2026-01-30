<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Unitkerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with(['user', 'jabatan', 'unitkerja'])->get();
        return view('admin.pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $jabatans = Jabatan::all();
        $unitkerjas = Unitkerja::all();
        return view('admin.pegawai.create', compact('jabatans', 'unitkerjas'));
    }

    public function store(Request $request)
    {

        $validasi = $request->validate([
        'nip' => 'required|digits:18|unique:pegawais,nip',
        'nama' => 'required',
        'alamat' => 'required',
        'telp' => 'required',
        'jk' => 'required',
        'username' => 'required|unique:users,username',
        'password' => 'required',
        'email' => 'required|unique:users,email',
        'jabatan_id' => 'required',
        'unitkerja_id' => 'required',
        'foto' => 'nullable|file|image|mimes:jpg,jpeg,png|max:2048'
    ], [
            
        'nip.unique' => 'NIP sudah digunakan.',
        'nip.digits' => 'NIP harus terdiri dari 18 digit.',
        'nama.required' => 'Nama harus diisi.',
        'alamat.required' => 'Alamat harus diisi.',
        'telp.required' => 'Nomor HP harus diisi.',
        'jk.required' => 'Jenis kelamin harus dipilih.',
        'username.required' => 'Username harus diisi.',
        'username.unique' => 'Username sudah digunakan.',
        'password.required' => 'Password harus diisi.',
        'email.required' => 'Email harus diisi.',
        'email.unique' => 'Email sudah digunakan.',
        'jabatan_id.required' => 'Jabatan harus dipilih.',
        'unitkerja_id.required' => 'Unit kerja harus dipilih.',
        'foto.file' => 'Foto harus berupa file.',
        'foto.image' => 'Foto harus berupa gambar.',
        'foto.mimes' => 'Foto harus berekstensi jpg, jpeg, atau png.',
        'foto.max' => 'Ukuran foto maksimal 2 MB.'
    ]);



        $namaFoto = null;
        //simpan foto tanpa storage
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            // Buat folder public/foto_pegawai kalau belum ada
            $pathFolder = public_path('foto_pegawai');
            if (!file_exists($pathFolder)) {
                mkdir($pathFolder, 0777, true);
            }

            // Pindahkan file ke folder public/foto_pegawai
            $foto->move($pathFolder, $namaFoto);
        }

        // =========================
        // SIMPAN USER TANPA HASH
        // =========================
        $user = new User();
        $user->name = 'pegawai';
        $user->username = $validasi['username'];
        $user->email = $validasi['email'];
        $user->password = $validasi['password']; // TANPA HASH
        $user->role = 'pegawai';
        $user->save();

        // =========================
        // SIMPAN PEGAWAI
        // =========================
        $pegawai = new Pegawai();
        $pegawai->nip = $validasi['nip'];
        $pegawai->nama = $validasi['nama'];
        $pegawai->alamat = $validasi['alamat'];
        $pegawai->telp = $validasi['telp'];
        $pegawai->jk = $validasi['jk'];
        $pegawai->username = $validasi['username'];
        $pegawai->password = $validasi['password'];
        $pegawai->user_id = $user->id;
        $pegawai->jabatan_id = $validasi['jabatan_id'];
        $pegawai->unitkerja_id = $validasi['unitkerja_id'];
        $pegawai->foto = $namaFoto;
        $pegawai->save();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function show(Pegawai $pegawai)
    {
        return view('admin.pegawai.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        $jabatans = Jabatan::all();
        $unitkerjas = Unitkerja::all();
        return view('admin.pegawai.edit', compact('pegawai', 'jabatans', 'unitkerjas'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nip' => 'nullable|unique:pegawais,nip,' . $pegawai->id,
            'nama' => 'nullable',
            'alamat' => 'nullable',
            'telp' => 'nullable',
            'jk' => 'nullable',
            'jabatan_id' => 'nullable',
            'unitkerja_id' => 'nullable',
            'password' => 'nullable',
            'foto' => 'nullable|file|image|max:2048'
        ]);

        // =========================
        // UPDATE DATA PEGAWAI
        // =========================
        $pegawai->nip = $request->nip ?? $pegawai->nip;
        $pegawai->nama = $request->nama ?? $pegawai->nama;
        $pegawai->alamat = $request->alamat ?? $pegawai->alamat;
        $pegawai->telp = $request->telp ?? $pegawai->telp;
        $pegawai->jk = $request->jk ?? $pegawai->jk;
        $pegawai->jabatan_id = $request->jabatan_id ?? $pegawai->jabatan_id;
        $pegawai->unitkerja_id = $request->unitkerja_id ?? $pegawai->unitkerja_id;

        // =========================
        // UPDATE PASSWORD (opsional)
        // =========================
        if ($request->filled('password')) {
            $pegawai->password = $request->password;
            if ($pegawai->user) {
                $pegawai->user->password = $request->password;
                $pegawai->user->save();
            }
        }

        // =========================
        // UPDATE FOTO
        // =========================
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if ($pegawai->foto && Storage::exists('public/foto_pegawai/' . $pegawai->foto)) {
                Storage::delete('public/foto_pegawai/' . $pegawai->foto);
            }

            $foto = $request->file('foto');

            if (!Storage::exists('public/foto_pegawai')) {
                Storage::makeDirectory('public/foto_pegawai');
            }

            $path = $foto->store('public/foto_pegawai');
            $pegawai->foto = basename($path);
        }

        $pegawai->save();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        // Hapus foto jika ada
        if ($pegawai->foto && Storage::exists('public/foto_pegawai/' . $pegawai->foto)) {
            Storage::delete('public/foto_pegawai/' . $pegawai->foto);
        }

        // Hapus user terkait
        if ($pegawai->user) {
            $pegawai->user->delete();
        }

        // Hapus pegawai
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai beserta data user dan fotonya berhasil dihapus.');
    }
    
}
