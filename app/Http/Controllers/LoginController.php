<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('utama.login');
    }

    public function authenticate(Request $request):RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            // Check user role and redirect accordingly
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('dashboard.admin');
            } elseif ($user->role === 'pegawai') {
                return redirect()->route('dashboard.pegawai');
            } else {
                Auth::logout();
                return back()->with('loginError', 'role tidak dikenali.');
            }
        }

        else {
            return $this->LoginError();
        }
    }

    public function LoginError()
    {
        return back()->with('loginError', 'Username atau password salah.');
    }


    public function logout(Request $request):RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
