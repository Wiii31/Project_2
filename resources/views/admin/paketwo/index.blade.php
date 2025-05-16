@extends('layout.v_template')
@section('content')
    <style>
        .custom-card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            border: none;
        }

        .custom-card .card-header {
            border-radius: 18px 18px 0 0;
            background: linear-gradient(90deg, #4e73df 0%, #1cc88a 100%);
            color: #fff;
            padding: 24px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .custom-card .card-body {
            padding: 32px;
        }

        .btn-pink {
            background: #ff3e6c;
            color: #fff;
            border: none;
            font-weight: bold;
            border-radius: 8px;
            padding: 10px 24px;
            transition: 0.2s;
        }

        .btn-pink:hover {
            background: #d81b60;
            color: #fff;
        }

        .btn-warning {
            border-radius: 8px;
            font-weight: bold;
            padding: 6px 18px;
        }

        .btn-danger {
            border-radius: 8px;
            font-weight: bold;
            padding: 6px 18px;
        }

        .table {
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
        }

        .table th {
            background: #f8f9fc;
            color: #4e73df;
            font-weight: bold;
            vertical-align: middle;
        }

        .alert-success {
            border-radius: 8px;
            font-size: 1rem;
            margin-bottom: 24px;
        }
    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">Daftar Paket WO</h3>
                        <a href="{{ route('paket-wo.create') }}" class="btn btn-pink">Tambah Paket WO</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="mb-3">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 25%">Nama Paket</th>
                                        <th style="width: 20%">Harga</th>
                                        <th>Deskripsi</th>
                                        <th style="width: 18%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paketwo as $index => $paket)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $paket->nama_paket }}</td>
                                            <td>Rp{{ number_format($paket->harga, 0, ',', '.') }}</td>
                                            <td>{{ $paket->deskripsi }}</td>
                                            <td>
                                                <a href="{{ route('paket-wo.edit', $paket->id) }}"
                                                    class="btn btn-warning btn-sm me-1">Edit</a>
                                                <form action="{{ route('paket-wo.destroy', $paket->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin hapus?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($paketwo->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center">Belum ada data paket WO.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
