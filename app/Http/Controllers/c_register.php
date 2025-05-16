<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_register; // Sesuaikan modelmu, misal pakai model User

class c_register extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:tb_akun,username',
            'password' => 'required|string|min:6',
        ]);

        $last = m_register::orderBy('id_akun', 'desc')->first();
        $nextNumber = $last ? intval(substr($last->id_akun, 1)) + 1 : 1;
        $idAkun = 'A' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT); // Format A001, A002, dst

        // Simpan data ke database
        m_register::create([
            'id_akun' => $idAkun,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password), // pastikan password di-hash!
            'tipe_akun' => 'User', // default user
        ]);

        // Redirect + kirim notifikasi sukses
        return redirect()->back()->with('success', 'Registrasi berhasil!');
    }
}
