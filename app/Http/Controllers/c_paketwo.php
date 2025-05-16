<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paketwo;

class c_paketwo extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paketwo = Paketwo::all();
        return view('admin.paketwo.index', compact('paketwo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.paketwo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        Paketwo::create($request->all());
        return redirect()->route('paket-wo.index')->with('success', 'Paket WO berhasil ditambahkan!');
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
    public function edit($id)
    {
        $paketwo = Paketwo::findOrFail($id);
        return view('admin.paketwo.edit', compact('paketwo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        $paketwo = Paketwo::findOrFail($id);
        $paketwo->update($request->all());
        return redirect()->route('paket-wo.index')->with('success', 'Paket WO berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paketwo = Paketwo::findOrFail($id);
        $paketwo->delete();
        return redirect()->route('paket-wo.index')->with('success', 'Paket WO berhasil dihapus!');
    }
}
