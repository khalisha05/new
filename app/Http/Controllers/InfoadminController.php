<?php

namespace App\Http\Controllers;

use App\Models\Infoadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;



class InfoadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infoadmins  = Infoadmin::all();
        return view('infoadmins.infoadmin', compact('infoadmins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('infoadmins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'gambar' => 'required',
                'judul' => 'required',
                'deskripsi' => 'required',

            ],
            [
                'gambar.required' => 'Gambar tidak boleh kosong',
                'judul.required' => 'Judul kelamin tidak boleh kosong',
                'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            ]
        );

        $path = $request->file('gambar')->store('uploads');

        $infoadmin = new Infoadmin();
        $infoadmin->gambar = basename($path);
        $infoadmin->judul = $request['judul'];
        $infoadmin->deskripsi = $request['deskripsi'];
        $infoadmin->save();

        return redirect()->route('infoadmins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $infoadmin = Infoadmin::findOrFail($id);
        return view('infoadmins.show', compact('infoadmin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $infoadmin = Infoadmin::findOrFail($id);
        return view('infoadmins.edit', compact('infoadmin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'gambar' => 'required',
                'judul' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'gambar.required' => 'Gambar tidak boleh kosong',
                'judul.required' => 'Judul tidak boleh kosong',
                'deskripsi.required' => 'Deskripsi tidak boleh kosong',

            ]
        );

        $infoadmin = Infoadmin::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($infoadmin->gambar) {
                Storage::delete('uploads/' . $infoadmin->gambar);
            }
            $path = $request->file('gambar')->store('uploads');
            $infoadmin->gambar = basename($path);
        }
        $infoadmin->judul = $request['judul'];
        $infoadmin->deskripsi = $request['deskripsi'];
        $infoadmin->save();

        return redirect()->route('infoadmins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $infoadmin = Infoadmin::findOrFail($id);
        if ($infoadmin->gambar == false) {
            Storage::delete('uploads/' . $in->gambar);
        }
        $infoadmin->delete();

        return redirect()->route('infoadmins.index');
    }
}
