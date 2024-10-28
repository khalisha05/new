<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnis  = Alumni::all();
        return view('alumnis.alumni', compact('alumnis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'foto' => 'required',
                'nama' => 'required',
                'no_nic' => 'required',
                'alamat' => 'required',

            ],
            [
                'foto.required' => 'Foto tidak boleh kosong',
                'nama.required' => 'Nama tidak boleh kosong',
                'no_nic.required' => 'No NIC tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
            ]
        );

        $path = $request->file('foto')->store('uploads');

        $alumni = new Alumni();
        $alumni->foto = basename($path);
        $alumni->nama = $request['nama'];
        $alumni->no_nic = $request['no_nic'];
        $alumni->alamat = $request['alamat'];
        $alumni->save();

        return redirect()->route('alumnis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('alumnis.show', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('alumnis.edit', compact('alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'foto' => 'required',
                'nama' => 'required',
                'no_nic' => 'required',
                'alamat' => 'required',
            ],
            [
                'foto.required' => 'Foto tidak boleh kosong',
                'nama.required' => 'Nama tidak boleh kosong',
                'no_nic.required' => 'No NIC tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',

            ]
        );

        $alumni = Alumni::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($alumni->foto) {
                Storage::delete('uploads/' . $alumni->foto);
            }
            $path = $request->file('foto')->store('uploads');
            $alumni->foto = basename($path);
        }
        $alumni->nama = $request['nama'];
        $alumni->no_nic= $request['no_nic'];
        $alumni->alamat= $request['alamat'];
        $alumni->save();

        return redirect()->route('alumnis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumni = Alumni::findOrFail($id);
        if ($alumni->foto == false) {
            Storage::delete('uploads/' . $in->foto);
        }
        $alumni->delete();

        return redirect()->route('alumnis.index');
    }
}
