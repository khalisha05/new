<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if ($user = Auth::User()) {
            return redirect()->intended('users');
        }

        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $kredensial = $request->only('email', 'password');
        if (auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = auth::user();
            return redirect()->intended('users');
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
