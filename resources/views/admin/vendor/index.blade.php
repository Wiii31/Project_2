@extends('layout.v_template')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">Daftar Vendor</h3>
                        <a href="{{ route('vendor.create') }}" class="btn btn-pink">Tambah Vendor</a>
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
                                        <th>No</th>
                                        <th>Nama Vendor</th>
                                        <th>Kategori</th>
                                        <th>Lokasi</th>
                                        <th>Harga Mulai</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendor as $index => $v)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $v->name }}</td>
                                            <td>{{ $v->category }}</td>
                                            <td>{{ $v->location }}</td>
                                            <td>Rp{{ number_format($v->price_start, 0, ',', '.') }}</td>
                                            <td>{{ $v->status }}</td>
                                            <td>
                                                <a href="{{ route('vendor.edit', $v->id) }}"
                                                    class="btn btn-warning btn-sm me-1">Edit</a>
                                                <form action="{{ route('vendor.destroy', $v->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin hapus?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($vendor->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center">Belum ada data vendor.</td>
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
