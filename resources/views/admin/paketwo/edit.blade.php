@extends('layout.v_template')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Paket WO</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('paket-wo.update', $paketwo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" value="{{ $paketwo->nama_paket }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{ $paketwo->harga }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required>{{ $paketwo->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('paket-wo.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
