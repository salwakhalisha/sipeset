<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori  = kategori::all();
        return view('admin.kategori.index', 
        [
            "menu" => "Kategori Aset",
            "title" => "Data Kategori",
            "kategori" => $kategori
        ]);
    }

    public function create()
    {
        return view('admin.kategori.create', 
        [
            "menu"=> "Kategori Aset"
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
        ]);

        $data_baru = new kategori();
        $data_baru->nama = $validasi['nama'];
        $data_baru->save();

        return redirect()->route('kategori.index');
    }

    public function edit($id)
    {
        $kategori = kategori::find($id);
        return view('admin.kategori.edit', 
        [
            "menu" => "Kategori Aset"
            , "kategori" => $kategori
        ]);
    }

    public function update()
    {
        $validasi =request()->validate([
            'id' => 'required',
            'nama' => 'required',
        ]);

        $kategori = kategori::find($validasi['id']);
        $kategori->nama = $validasi['nama'];
        $kategori->save();

        return redirect()->route('kategori.index');
    }
    public function destroy($id)
    {
        $kategori = kategori::find($id);
        $kategori->delete();

        return redirect()->route('kategori.index');
    }
}
