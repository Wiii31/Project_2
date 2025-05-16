<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Barryvdh\DomPDF\Facade\Pdf;

class c_laporan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = \App\Models\Laporan::all();
        return view('admin.laporan.index', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
        ]);

        \App\Models\Laporan::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'isi' => $request->isi,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan');
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
        $laporan = \App\Models\Laporan::findOrFail($id);
        return view('admin.laporan.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
        ]);

        $laporan = \App\Models\Laporan::findOrFail($id);
        $laporan->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'isi' => $request->isi,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = \App\Models\Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus');
    }

    // public function print()
    // {
    //     $laporan = \App\Models\Laporan::all();
    //     return view('admin.laporan.print', compact('laporan'));
    // }

    public function exportPdf()
    {
        $laporan = \App\Models\Laporan::all();
        $pdf = Pdf::loadView('admin.laporan.pdf', compact('laporan'));
        return $pdf->download('laporan.pdf');
    }
}
