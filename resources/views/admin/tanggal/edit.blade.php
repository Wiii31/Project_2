@extends('layout.v_template')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">{{ isset($tanggal) ? 'Edit' : 'Tambah' }} Tanggal</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($tanggal) ? route('tanggal.update', $tanggal->id) : route('tanggal.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($tanggal))
                                @method('PUT')
                            @endif
                            <div class="mb-3">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="{{ old('tanggal', $tanggal->tanggal ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control"
                                    value="{{ old('keterangan', $tanggal->keterangan ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                            </div>
                            <button type="submit" class="btn btn-pink">Simpan</button>
                            <a href="{{ route('tanggal.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
