<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AsetExport;
use Barryvdh\DomPDF\Facade\Pdf;

class AsetController extends Controller
{
    // Menampilkan daftar aset
    public function index()
    {
        $menu = 'aset'; 
        $asets = Aset::with('kategori')->latest()->get();
        $kategoris = Kategori::all(); 
        return view('admin.aset.index', compact('asets', 'kategoris', 'menu'));
    }

    public function create()
    {
        $menu = 'aset';
        $kategoris = Kategori::all();
        return view('admin.aset.create', compact('kategoris', 'menu'));
    }

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

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('aset_foto', 'public');
            $data['foto'] = $path;
        }

        Aset::create($data);

        return redirect()->route('aset.index')->with('success', 'Aset baru berhasil ditambahkan!');
    }

    public function show(Aset $aset)
    {
        return view('admin.aset.show', compact('aset'));
    }

    public function edit(Aset $aset)
    {
        $kategoris = Kategori::all();
        return view('admin.aset.edit', compact('aset', 'kategoris'));
    }

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

    public function destroy(Aset $aset)
    {
        if ($aset->foto && Storage::disk('public')->exists($aset->foto)) {
            Storage::disk('public')->delete($aset->foto);
        }

        $aset->delete();

        return redirect()->route('aset.index')->with('success', 'Aset berhasil dihapus!');
    }

    // ======================
    // Export Excel & PDF
    // ======================

    public function exportExcel()
    {
        return Excel::download(new AsetExport, 'data-aset.xlsx');

        $filters = $request->only(['kategori_id', 'status', 'kondisi', 'lokasi']);

        return Excel::download(new AsetExport($filters), 'data-aset.xlsx');
    }

    public function exportPDF(Request $request)
    {
        $query = Aset::query();

    // Terapkan filter
    if ($request->kategori_id && $request->kategori_id != '') {
        $query->where('kategori_id', $request->kategori_id);
    }
    if ($request->status && $request->status != '') {
        $query->where('status', $request->status);
    }
    if ($request->kondisi && $request->kondisi != '') {
        $query->where('kondisi', $request->kondisi);
    }
    if ($request->lokasi && $request->lokasi != '') {
        $query->where('lokasi', 'like', '%' . $request->lokasi . '%');
    }

    $asets = $query->with('kategori')->get();

    $pdf = PDF::loadView('admin.aset.pdf', compact('asets'));
    return $pdf->download('data-aset.pdf');
    }

    public function filter(Request $request)
{
    $query = Aset::query();

    // Filter berdasarkan kategori
    if ($request->kategori_id && $request->kategori_id != '') {
        $query->where('kategori_id', $request->kategori_id);
    }

    // Filter berdasarkan status
    if ($request->status && $request->status != '') {
        $query->where('status', $request->status);
    }

    // Filter berdasarkan kondisi
    if ($request->kondisi && $request->kondisi != '') {
        $query->where('kondisi', $request->kondisi);
    }

    // Filter berdasarkan lokasi
    if ($request->lokasi && $request->lokasi != '') {
        $query->where('lokasi', 'like', '%' . $request->lokasi . '%');
    }

    $asets = $query->with('kategori')->get();
    $kategoris = Kategori::all();

    return view('admin.aset.index', compact('asets', 'kategoris'));
}

}
