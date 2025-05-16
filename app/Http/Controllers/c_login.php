<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class c_login extends Controller
{

    public function showLoginForm()
    {
    return view('v_login'); // Sesuaikan dengan nama view login kamu
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Ambil data akun dari tabel
        $user = DB::table('tb_akun')->where('username', $request->username)->first();

        // Cek apakah user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan data user ke session manual
            $request->session()->put('login', true);
            $request->session()->put('id_akun', $user->id_akun);
            $request->session()->put('tipe_akun', $user->tipe_akun);
            $request->session()->put('username', $user->username);

            // // Tambahkan ini untuk debug
            // dd(session()->all());

            // Redirect berdasarkan tipe akun
            switch (strtolower($user->tipe_akun)) {
                case 'admin':
                    return redirect('/admin')->with('success', 'Login berhasil! Selamat datang Admin.');
                case 'vendor':
                    return redirect('/vendor')->with('success', 'Login berhasil! Selamat datang Vendor.');
                case 'user':
                    return redirect('/user')->with('success', 'Login berhasil! Selamat datang User.');
                default:
                    return redirect('/login')->with('error', 'Tipe akun tidak valid!');
            }
        }

        // Gagal login
        return back()->with('error', 'Username atau password salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['login', 'id_akun', 'tipe_akun', 'username']);
        return redirect()->route('login');
    }
}
