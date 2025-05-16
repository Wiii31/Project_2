@extends('layout.v_template')
@section('page')
@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dashboard Admin</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-3">
                        <a href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0">
                            <i class="material-symbols-rounded">logout</i> Logout
                        </a>
                    </div>
                    <div class="row">
                        <!-- Menu Kelola Paket WO -->
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('paket-wo.index') }}" class="btn btn-outline-primary w-100">
                                Kelola Paket WO
                            </a>
                        </div>
                        <!-- Menu Kelola Tanggal -->
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('tanggal.index') }}" class="btn btn-outline-primary w-100">
                                Kelola Tanggal
                            </a>
                        </div>
                        <!-- Menu Kelola Vendor -->
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('vendor.index') }}" class="btn btn-outline-primary w-100">
                                Kelola Vendor
                            </a>
                        </div>
                        <!-- Menu Kelola Kegiatan -->
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('kegiatan.index') }}" class="btn btn-outline-primary w-100">
                                Kelola Kegiatan
                            </a>
                        </div>
                        <!-- Menu Kelola Keuangan -->
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('keuangan.index') }}" class="btn btn-outline-primary w-100">
                                Kelola Keuangan
                            </a>
                        </div>
                        <!-- Menu Kelola Pesanan -->
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('pesanan.index') }}" class="btn btn-outline-primary w-100">
                                Kelola Pesanan
                            </a>
                        </div>
                        <!-- Menu Kelola User -->
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('user.index') }}" class="btn btn-outline-primary w-100">
                                Kelola User
                            </a>
                        </div>
                        <!-- Menu Kelola Laporan -->
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('laporan.index') }}" class="btn btn-outline-primary w-100">
                                Kelola Laporan
                            </a>
                        </div>
                        <!-- Menu Penugasan Tim -->
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('penugasan-tim.index') }}" class="btn btn-outline-primary w-100">
                                Penugasan Tim
                            </a>
                        </div>
                        <!-- Menu Lihat Jasa Vendor -->
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('vendor.index') }}" class="btn btn-outline-primary w-100">
                                Lihat Jasa Vendor
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
