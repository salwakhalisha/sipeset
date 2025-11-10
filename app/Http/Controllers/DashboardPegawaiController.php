<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPegawaiController extends Controller
{
     public function dashboard()
    {
        return view('pegawai.index', [
            'menu' => 'home'
        ]);
    }
}
