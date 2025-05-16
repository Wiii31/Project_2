<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_penugasantim extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penugasan = \App\Models\PenugasanTim::all();
        return view('admin.penugasan_tim.index', compact('penugasan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatan = \App\Models\Kegiatan::all();
        return view('admin.penugasan_tim.create', compact('kegiatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'kegiatan_id' => 'required|exists:kegiatan,id',
            'tugas' => 'required|string|max:255',
        ]);

        \App\Models\PenugasanTim::create([
            'nama_tim' => $request->nama_tim,
            'kegiatan_id' => $request->kegiatan_id,
            'tugas' => $request->tugas,
        ]);

        return redirect()->route('penugasan-tim.index')->with('success', 'Penugasan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penugasan = \App\Models\PenugasanTim::findOrFail($id);
        $kegiatan = \App\Models\Kegiatan::all();
        return view('admin.penugasan_tim.edit', compact('penugasan', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'kegiatan_id' => 'required|exists:kegiatan,id',
            'tugas' => 'required|string|max:255',
        ]);

        $penugasan = \App\Models\PenugasanTim::findOrFail($id);
        $penugasan->update([
            'nama_tim' => $request->nama_tim,
            'kegiatan_id' => $request->kegiatan_id,
            'tugas' => $request->tugas,
        ]);

        return redirect()->route('penugasan-tim.index')->with('success', 'Penugasan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penugasan = \App\Models\PenugasanTim::findOrFail($id);
        $penugasan->delete();

        return redirect()->route('penugasan-tim.index')->with('success', 'Penugasan berhasil dihapus');
    }
}
