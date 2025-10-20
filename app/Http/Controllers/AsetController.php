<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class AsetController extends Controller
{
    /**
     * Menampilkan daftar aset.
     */
   public function index()
    {
        $menu = 'aset'; // nama menu aktif
        $asets = Aset::with('kategori')->latest()->get();
        return view('admin.aset.index', compact('asets', 'menu'));
    }

    public function create()
    {
        $menu = 'aset';
        $kategoris = Kategori::all();
        return view('admin.aset.create', compact('kategoris', 'menu'));
    }


    /**
     * Menyimpan data aset baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|string',
            'kondisi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['nama', 'status', 'kondisi', 'lokasi', 'kategori_id']);

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('aset_foto', 'public');
            $data['foto'] = $path;
        }

        Aset::create($data);

        return redirect()->route('aset.index')->with('success', 'Aset baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail aset tertentu (opsional).
     */
    public function show(Aset $aset)
    {
        return view('admin.aset.show', compact('aset'));
    }

    /**
     * Menampilkan form edit aset.
     */
    public function edit(Aset $aset)
    {
        $kategoris = Kategori::all();
        return view('admin.aset.edit', compact('aset', 'kategoris'));
    }

    /**
     * Memperbarui data aset.
     */
    public function update(Request $request, Aset $aset)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|string',
            'kondisi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['nama', 'status', 'kondisi', 'lokasi', 'kategori_id']);

        // Ganti foto jika di-upload ulang
        if ($request->hasFile('foto')) {
            if ($aset->foto && Storage::disk('public')->exists($aset->foto)) {
                Storage::disk('public')->delete($aset->foto);
            }
            $path = $request->file('foto')->store('aset_foto', 'public');
            $data['foto'] = $path;
        }

        $aset->update($data);

        return redirect()->route('aset.index')->with('success', 'Data aset berhasil diperbarui!');
    }

    /**
     * Menghapus aset.
     */
    public function destroy(Aset $aset)
    {
        if ($aset->foto && Storage::disk('public')->exists($aset->foto)) {
            Storage::disk('public')->delete($aset->foto);
        }

        $aset->delete();

        return redirect()->route('aset.index')->with('success', 'Aset berhasil dihapus!');
    }
}
