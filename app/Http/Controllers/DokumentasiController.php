<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumentasis  = Dokumentasi::all();
        return view('dokumentasis.dokumentasi', compact('dokumentasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokumentasis.create');
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

        $dokumentasi = new Dokumentasi();
        $dokumentasi->gambar = basename($path);
        $dokumentasi->judul = $request['judul'];
        $dokumentasi->deskripsi = $request['deskripsi'];
        $dokumentasi->save();

        return redirect()->route('dokumentasis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        return view('dokumentasis.show', compact('dokumentasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        return view('dokumentasis.edit', compact('dokumentasi'));
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

        $dokumentasi = Dokumentasi::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($dokumentasi->gambar) {
                Storage::delete('uploads/' . $dokumentasi->gambar);
            }
            $path = $request->file('gambar')->store('uploads');
            $dokumentasi->gambar = basename($path);
        }
        $dokumentasi->judul = $request['judul'];
        $dokumentasi->deskripsi = $request['deskripsi'];
        $dokumentasi->save();

        return redirect()->route('dokumentasis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        if ($dokumentasi->gambar == false) {
            Storage::delete('uploads/' . $in->gambar);
        }
        $dokumentasi->delete();

        return redirect()->route('dokumentasis.index');
    }
}
