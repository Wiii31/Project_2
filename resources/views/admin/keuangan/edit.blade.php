@extends('layout.v_template')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">{{ isset($keuangan) ? 'Edit' : 'Tambah' }} Keuangan</h3>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($keuangan) ? route('keuangan.update', $keuangan->id) : route('keuangan.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($keuangan))
                                @method('PUT')
                            @endif
                            <div class="mb-3">
                                <label>Jenis</label>
                                <input type="text" name="jenis" class="form-control"
                                    value="{{ old('jenis', $keuangan->jenis ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" class="form-control"
                                    value="{{ old('jumlah', $keuangan->jumlah ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="{{ old('tanggal', $keuangan->tanggal ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control">{{ old('keterangan', $keuangan->keterangan ?? '') }}</textarea>
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
