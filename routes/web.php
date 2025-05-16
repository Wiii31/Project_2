<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_vendor;
use App\Http\Controllers\c_login;
use App\Http\Controllers\c_register;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\c_paketwo;
use App\Http\Controllers\c_tanggal;
use App\Http\Controllers\c_kegiatan;
use App\Http\Controllers\c_keuangan;
use App\Http\Controllers\c_pesanan;
use App\Http\Controllers\c_user;
use App\Http\Controllers\c_laporan;
use App\Http\Controllers\c_jasaproduk;
use App\Http\Controllers\c_pesananvendor;
use App\Http\Controllers\c_pembayaranvendor;
use App\Http\Controllers\c_pembayaran;
use App\Http\Middleware\isAdmin;
use App\Http\Controllers\c_penugasantim;

// Route Vendor
Route::get('/vendor', [c_vendor::class, 'index'])->name('vendor.index'); // v_vendor
Route::get('/vendor/detail/{id}', [c_vendor::class, 'show'])->name('vendor.show'); // v_detail_vendor
Route::get('/vendor/add', [c_vendor::class, 'create'])->name('vendor.create'); // v_tambahvendor
Route::post('/vendor/store', [c_vendor::class, 'store'])->name('vendor.store');
Route::get('/vendor/edit/{id}', [c_vendor::class, 'edit'])->name('vendor.edit'); // v_editvendor
Route::put('/vendor/update/{id}', [c_vendor::class, 'update'])->name('vendor.update'); // Menggunakan PUT
Route::delete('/vendor/delete/{id}', [c_vendor::class, 'destroy'])->name('vendor.destroy'); // Menggunakan DELETE

// Route untuk Auth2
Route::get('/login', [c_login::class, 'showLoginForm'])->name('login');
Route::post('/login', [c_login::class, 'login']);
Route::get('/logout', [c_login::class, 'logout'])->name('logout');
Route::get('/register', function(){ return view('v_register'); });
Route::post('/register', [c_register::class, 'store'])->name('register.store');

// Landing Page
Route::get('/', function(){ return view('index'); });

// Group Admin
Route::middleware([isAdmin::class])->prefix('admin')->group(function () {
    Route::get('/', function () { return view('admin.v_Admin'); })->name('admin.dashboard');
    Route::resource('paket-wo', c_paketwo::class);
    Route::resource('tanggal', c_tanggal::class);
    Route::resource('kegiatan', c_kegiatan::class);
    Route::resource('keuangan', c_keuangan::class);
    Route::resource('pesanan', c_pesanan::class);
    Route::resource('user', c_user::class);
    Route::resource('laporan', c_laporan::class);
    // Route::get('laporan/print', [c_laporan::class, 'print'])->name('laporan.print');
    Route::get('laporan/export-pdf', [c_laporan::class, 'exportPdf'])->name('laporan.exportPdf');
    Route::resource('penugasan-tim', c_penugasantim::class);
    Route::resource('vendor', c_vendor::class);
});

// Group Vendor
Route::middleware(['auth', 'isVendor'])->prefix('vendor')->group(function () {
    Route::get('/', function () { return view('vendor.dashboard'); })->name('vendor.dashboard');
    Route::resource('jasa-produk', c_jasaproduk::class);
    Route::resource('pesanan', c_pesananvendor::class);
    Route::get('pembayaran', [c_pembayaranvendor::class, 'index'])->name('vendor.pembayaran');
    // dst, sesuai fitur vendor
});

// Group User/Klien
Route::middleware(['auth', 'isUser'])->prefix('user')->group(function () {
    Route::get('/', function () { return view('user.v_User'); })->name('user.dashboard');
    Route::get('paket-wo', [c_paketwo::class, 'index'])->name('user.paketwo');
    Route::get('tanggal', [c_tanggal::class, 'index'])->name('user.tanggal');
    Route::get('pembayaran', [c_pembayaran::class, 'index'])->name('user.pembayaran');
    // dst, sesuai fitur klien
});

Route::get('/home', function () {
    return view('admin.v_Admin');
})->name('home');