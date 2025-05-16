@extends('layout.v_template')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">{{ isset($kegiatan) ? 'Edit' : 'Tambah' }} Kegiatan</h3>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($kegiatan) ? route('kegiatan.update', $kegiatan->id) : route('kegiatan.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($kegiatan))
                                @method('PUT')
                            @endif
                            <div class="mb-3">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control"
                                    value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="{{ old('tanggal', $kegiatan->tanggal ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $kegiatan->deskripsi ?? '') }}</textarea>
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
