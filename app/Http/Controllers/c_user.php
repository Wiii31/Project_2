<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;

class c_user extends Controller
{
    public function index()
    {
        $users = Akun::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:tb_akun',
            'password' => 'required|string|min:8',
            'tipe_akun' => 'required|in:admin,user,vendor'
        ]);

        Akun::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'tipe_akun' => $request->tipe_akun
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $user = Akun::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:tb_akun,username,' . $id . ',id_akun',
            'password' => 'nullable|string|min:8',
            'tipe_akun' => 'required|in:admin,user,vendor'
        ]);

        $user = Akun::findOrFail($id);
        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
            'tipe_akun' => $request->tipe_akun
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $user = Akun::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}