<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materis  = Materi::all();
        return view('materis.materi', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'materi' => 'required',
            ],
            [
                'materi.required' => 'Materi tidak boleh kosong',
                
            ]
        );

        $materi = new Materi();
        $materi->materi = $request['materi'];
        $materi->save();

        return redirect()->route('materis.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materi = Materi::findOrFail($id);
        return view('materis.show', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materi = Materi::findOrFail($id);
        return view('materis.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'materi' => 'required',
            ],
            [
                'materi.required' => 'Materi tidak boleh kosong',
                
            ]
        );

        $materi = Materi::findOrFail($id);


        $materi->materi = $request['materi'];
        $materi->save();

        return redirect()->route('materis.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->route('materis.index');
    }
}
