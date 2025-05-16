@extends('layout.v_template')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">Daftar Pesanan</h3>
                        <a href="{{ route('pesanan.create') }}" class="btn btn-pink">Tambah Pesanan</a>
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
                                        <th>User</th>
                                        <th>Paket WO</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->user->name ?? '-' }}</td>
                                            <td>{{ $item->paketwo->nama_paket ?? '-' }}</td>
                                            <td>{{ $item->tanggal_pesan }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ route('pesanan.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm me-1">Edit</a>
                                                <form action="{{ route('pesanan.destroy', $item->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin hapus?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($pesanan->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">Belum ada data.</td>
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
