<?php

namespace App\Http\Controllers;

use App\Models\unitkerja;
use Illuminate\Http\Request;

class UnitkerjaController extends Controller
{
public function index()
    {
        $unitkerja  = unitkerja::all();
        return view('admin.unitkerja.index', 
        [
            "menu" => "unitkerja"
            , "unitkerja" => $unitkerja
        ]);
    }

    public function create()
    {
        return view('admin.unitkerja.index', 
        [
            "menu"=> "unitkerja"
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
        ]);

        $data_baru = new unitkerja();
        $data_baru->nama = $validasi['nama'];
        $data_baru->save();

        return redirect()->route('unitkerja.index');
    }

    public function edit($id)
    {
        $unitkerja = unitkerja::find($id);
        return view('admin.unitkerja.edit', 
        [
            "menu" => "unitkerja"
            , "unitkerja" => $unitkerja
        ]);
    }

    public function update()
    {
        $validasi =request()->validate([
            'id' => 'required',
            'nama' => 'required',
        ]);

        $unitkerja = unitkerja::find($validasi['id']);
        $unitkerja->nama = $validasi['nama'];
        $unitkerja->save();

        return redirect()->route('unitkerja.index');
    }
    public function destroy($id)
    {
        $unitkerja = unitkerja::find($id);
        $unitkerja->delete();

        return redirect()->route('unitkerja.index');
    }
}
