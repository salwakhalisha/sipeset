<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function dashboard()
    {
        $kategoriaset = kategori::count(); 
        $aset = aset::count(); 

        return view('admin.index', [
            'menu' => 'home',
            'kategoriaset' => $kategoriaset,
            'aset' => $aset,
        ]);
    }
}
