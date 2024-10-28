<?php

namespace App\Http\Controllers;

use App\Models\Zoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ZoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zooms  = Zoom::all();
        return view('zooms.zoom', compact('zooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('zooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'zoom' => 'required',
            ],
            [
                'zoom.required' => 'Link Zoom tidak boleh kosong',

            ]
        );

        $zoom = new Zoom();
        $zoom->zoom = $request['zoom'];
        $zoom->save();

        return redirect()->route('zooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $zoom = Zoom::findOrFail($id);
        return view('zooms.show', compact('zoom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $zoom = Zoom::findOrFail($id);
        return view('zooms.edit', compact('zoom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'zoom' => 'required',
            ],
            [
                'zoom.required' => 'Link Zoom tidak boleh kosong',

            ]
        );

        $zoom = Zoom::findOrFail($id);


        $zoom->zoom = $request['zoom'];
        $zoom->save();

        return redirect()->route('zooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $zoom = Zoom::findOrFail($id);
        $zoom->delete();

        return redirect()->route('zooms.index');
    }
}
