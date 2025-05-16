@extends('layout.v_template')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">{{ isset($penugasan) ? 'Edit' : 'Tambah' }} Penugasan Tim</h3>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($penugasan) ? route('penugasan-tim.update', $penugasan->id) : route('penugasan-tim.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($penugasan))
                                @method('PUT')
                            @endif
                            <div class="mb-3">
                                <label>Nama Tim</label>
                                <input type="text" name="nama_tim" class="form-control"
                                    value="{{ old('nama_tim', $penugasan->nama_tim ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Kegiatan</label>
                                <select name="kegiatan_id" class="form-control" required>
                                    <option value="">Pilih Kegiatan</option>
                                    @foreach ($kegiatan as $k)
                                        <option value="{{ $k->id }}"
                                            {{ old('kegiatan_id', $penugasan->kegiatan_id ?? '') == $k->id ? 'selected' : '' }}>
                                            {{ $k->nama_kegiatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Tugas</label>
                                <input type="text" name="tugas" class="form-control"
                                    value="{{ old('tugas', $penugasan->tugas ?? '') }}" required>
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
