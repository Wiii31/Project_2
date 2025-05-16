@extends('layout.v_template')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">{{ isset($pesanan) ? 'Edit' : 'Tambah' }} Pesanan</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($pesanan) ? route('pesanan.update', $pesanan->id) : route('pesanan.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($pesanan))
                                @method('PUT')
                            @endif
                            <div class="mb-3">
                                <label>User</label>
                                <select name="user_id" class="form-control" required>
                                    <option value="">Pilih User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id', $pesanan->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Paket WO</label>
                                <select name="paketwo_id" class="form-control" required>
                                    <option value="">Pilih Paket WO</option>
                                    @foreach ($paketwo as $paket)
                                        <option value="{{ $paket->id }}"
                                            {{ old('paketwo_id', $pesanan->paketwo_id ?? '') == $paket->id ? 'selected' : '' }}>
                                            {{ $paket->nama_paket }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal Pesan</label>
                                <input type="date" name="tanggal_pesan" class="form-control"
                                    value="{{ old('tanggal_pesan', $pesanan->tanggal_pesan ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control"
                                    value="{{ old('status', $pesanan->status ?? '') }}" required>
                            </div>
                            <button type="submit" class="btn btn-pink">Simpan</button>
                            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
