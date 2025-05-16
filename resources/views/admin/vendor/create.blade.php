@extends('layout.v_template')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">{{ isset($vendor) ? 'Edit' : 'Tambah' }} Vendor</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($vendor) ? route('vendor.update', $vendor->id) : route('vendor.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($vendor))
                                @method('PUT')
                            @endif
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control"
                                    value="{{ old('status', $vendor->status ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Nama Vendor</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $vendor->name ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Kategori</label>
                                <input type="text" name="category" class="form-control"
                                    value="{{ old('category', $vendor->category ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Lokasi</label>
                                <input type="text" name="location" class="form-control"
                                    value="{{ old('location', $vendor->location ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Harga Mulai</label>
                                <input type="number" name="price_start" class="form-control"
                                    value="{{ old('price_start', $vendor->price_start ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control">{{ old('description', $vendor->description ?? '') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Gambar (opsional)</label>
                                <input type="file" name="image_url" class="form-control">
                                @if (isset($vendor) && $vendor->image_url)
                                    <img src="{{ asset($vendor->image_url) }}" alt="Gambar Vendor" width="100"
                                        class="mt-2">
                                @endif
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                            </div>
                            <button type="submit" class="btn btn-pink">Simpan</button>
                            <a href="{{ route('vendor.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
