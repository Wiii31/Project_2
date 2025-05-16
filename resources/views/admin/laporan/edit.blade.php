@extends('layout.v_template')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">{{ isset($laporan) ? 'Edit' : 'Tambah' }} Laporan</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($laporan) ? route('laporan.update', $laporan->id) : route('laporan.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($laporan))
                                @method('PUT')
                            @endif
                            <div class="mb-3">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control"
                                    value="{{ old('judul', $laporan->judul ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="{{ old('tanggal', $laporan->tanggal ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Isi</label>
                                <textarea name="isi" class="form-control" required>{{ old('isi', $laporan->isi ?? '') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                            </div>
                            <button type="submit" class="btn btn-pink">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
