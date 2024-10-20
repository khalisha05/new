<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if ($user = Auth::User()) {
            return redirect()->intended('admin');
        }

        return view('login');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $kredensial = $request->only('email', 'password');
        if (auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = auth::user();
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'pesan' => 'Maaf Email atau Password Anda Salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
