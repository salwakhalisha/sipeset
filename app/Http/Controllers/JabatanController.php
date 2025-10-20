<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan  = jabatan::all();
        return view('admin.jabatan.index', 
        [
            "menu" => "jabatan"
            , "jabatan" => $jabatan
        ]);
    }

    public function create()
    {
        return view('admin.jabatan.create', 
        [
            "menu"=> "jabatan"
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
        ]);

        $data_baru = new jabatan();
        $data_baru->nama = $validasi['nama'];
        $data_baru->save();

        return redirect()->route('jabatan.index');
    }

    public function edit($id)
    {
        $jabatan = jabatan::find($id);
        return view('admin.jabatan.edit', 
        [
            "menu" => "jabatan"
            , "jabatan" => $jabatan
        ]);
    }

    public function update()
    {
        $validasi =request()->validate([
            'id' => 'required',
            'nama' => 'required',
        ]);

        $jabatan = jabatan::find($validasi['id']);
        $jabatan->nama = $validasi['nama'];
        $jabatan->save();

        return redirect()->route('jabatan.index');
    }
    public function destroy($id)
    {
        $jabatan = jabatan::find($id);
        $jabatan->delete();

        return redirect()->route('jabatan.index');
    }
}
