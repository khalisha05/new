<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users  = User::all();
        return view('users.user', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'jk' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
                'nohp' => 'required',
                'akses' => 'required',
                'foto' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'jk.required' => 'Jenis kelamin tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'nohp.required' => 'No.hp tidak boleh kosong',
                'nohp.numeric' => 'No.hp hanya bisa dengan angka',
                'akses.required' => 'akses tidak boleh kosong',
                'foto.required' => 'foto tidak boleh kosong',
            ]
        );

        $path = $request->file('foto')->store('uploads');

        $user = new User();
        $user->nama = $request['nama'];
        $user->jk = $request['jk'];
        $user->email = $request['email'];
        $user->password = Hash::make($request->password);
        $user->nohp = $request['nohp'];
        $user->akses = $request['akses'];
        $user->foto = $request['foto'];
        $user->foto = basename($path);
        $user->save();

        return redirect()->route('users.index');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'jk' => 'required',
                'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
                'nohp' => 'required',
                'akses' => 'required',
                'foto' => 'mimes:jpg,jpeg,png,gif|image',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'jk.required' => 'Jenis kelamin tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.unique' => 'Email sudah terdaftar',
                'nohp.required' => 'No.hp tidak boleh kosong',
                'nohp.numeric' => 'No.hp hanya bisa dengan angka',
                'akses.required' => 'akses tidak boleh kosong',
                'foto.required' => 'foto tidak boleh kosong',
            ]
        );

        $user = User::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                Storage::delete('uploads/' . $user->foto);
            }
            $path = $request->file('foto')->store('uploads');
            $user->foto = basename($path);
        }

        $user->nama = $request['nama'];
        $user->jk = $request['jk'];
        $user->email = $request['email'];
        $user->nohp = $request['nohp'];
        $user->akses = $request['akses'];
        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->foto) {
            Storage::delete('uploads/' . $user->foto);
        }
        $user->delete();

        return redirect()->route('users.index');
    }
}
