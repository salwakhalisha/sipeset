<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Pegawai;
use App\Models\Meminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MeminjamController extends Controller
{
    public function index()
    {
        $pegawaiId = Auth::user()->pegawai->id;

        $peminjams = Meminjam::with(['aset', 'pegawai'])
            ->where('pegawai_id', $pegawaiId)
            ->get();

        $asets = Aset::whereIn('status', ['tersedia', 'dikembalikan'])->get();
        $pegawais = Pegawai::all();

        return view('pegawai.meminjam.index', compact('peminjams', 'asets', 'pegawais'));
    }


    // Menyimpan peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'aset_id'        => 'required|exists:asets,id',
            'pegawai_id'     => 'required|exists:pegawais,id',
            'tanggal_pinjam' => 'required|date',
            'batas_kembali'  => 'required|date|after_or_equal:tanggal_pinjam',
            'keterangan'     => 'required|string|max:255',
            'foto'           => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('foto');
        $fileName = time().'_'.$file->getClientOriginalName();

        $destinationPath = public_path('peminjaman_fotos');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $fileName);

        // Simpan peminjaman
        $peminjam = Meminjam::create([
            'aset_id'       => $request->aset_id,
            'pegawai_id'    => $request->pegawai_id,
            'tanggal_pinjam'=> $request->tanggal_pinjam,
            'batas_kembali' => $request->batas_kembali,
            'keterangan'    => $request->keterangan,
            'foto'          => 'peminjaman_fotos/'.$fileName,
            'status'        => 'menunggu',
        ]);

        // Update status aset menjadi dipinjam
        $aset = Aset::find($request->aset_id);
        $aset->status = 'dipinjam';
        $aset->save();

        return redirect()->route('meminjam.index')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    // Update peminjaman
    public function update(Request $request, $id)
    {
        $peminjam = Meminjam::findOrFail($id);

        $validated = $request->validate([
            'aset_id'        => 'sometimes|exists:asets,id',
            'pegawai_id'     => 'sometimes|exists:pegawais,id',
            'tanggal_pinjam' => 'sometimes|date',
            'batas_kembali'  => 'sometimes|date',
            'keterangan'     => 'sometimes|string|max:255',
            'status'         => 'in:menunggu,disetujui,ditolak',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Validasi tanggal jika diubah
        $tanggalPinjam = $request->input('tanggal_pinjam') ?? $peminjam->tanggal_pinjam;
        $batasKembali = $request->input('batas_kembali') ?? $peminjam->batas_kembali;
        if ($tanggalPinjam && $batasKembali && strtotime($batasKembali) < strtotime($tanggalPinjam)) {
            return redirect()->back()->withInput()->withErrors([
                'batas_kembali' => 'Batas kembali harus sama atau setelah tanggal pinjam!'
            ]);
        }

        // Upload foto baru jika ada
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if (!empty($peminjam->foto) && file_exists(public_path($peminjam->foto))) {
                unlink(public_path($peminjam->foto));
            }
            $validated['foto'] = 'peminjaman_fotos/'.time().'_'.$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('peminjaman_fotos'), basename($validated['foto']));
        }

        // Update status aset lama jika diganti aset
        if (isset($validated['aset_id']) && $validated['aset_id'] != $peminjam->aset_id) {
            // Kembalikan aset lama ke tersedia
            $oldAset = Aset::find($peminjam->aset_id);
            $oldAset->status = 'tersedia';
            $oldAset->save();

            // Tandai aset baru sebagai dipinjam
            $newAset = Aset::find($validated['aset_id']);
            $newAset->status = 'dipinjam';
            $newAset->save();
        }

        $peminjam->update($validated);

        return redirect()->route('meminjam.index')->with('success', 'Peminjaman berhasil diperbarui!');
    }

    // Hapus peminjaman
    public function destroy($id)
    {
        $peminjam = Meminjam::findOrFail($id);

        // Kembalikan status aset ke tersedia
        $aset = Aset::find($peminjam->aset_id);
        if ($aset) {
            $aset->status = 'tersedia';
            $aset->save();
        }

        // Hapus foto
        if (!empty($peminjam->foto) && file_exists(public_path($peminjam->foto))) {
            unlink(public_path($peminjam->foto));
        }

        $peminjam->delete();

        return redirect()->route('meminjam.index')->with('success', 'Peminjaman berhasil dihapus!');
    }
}
