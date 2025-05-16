@extends('layout.v_template')
 
@section('page', 'Detail Vendor')
 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}" class="text-decoration-none">Vendor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Vendor</li>
                </ol>
            </nav>
 
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Detail Vendor</h5>
 
                    <!-- Detail Info -->
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Nama Vendor</div>
                        <div class="col-md-8">{{ $vendor->name }}</div>
                    </div>
 
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Kategori</div>
                        <div class="col-md-8">{{ $vendor->category }}</div>
                    </div>
 
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Lokasi</div>
                        <div class="col-md-8">{{ $vendor->location }}</div>
                    </div>
 
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Harga Mulai Dari</div>
                        <div class="col-md-8">Rp{{ number_format($vendor->price_start, 0, ',', '.') }}</div>
                    </div>
 
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Deskripsi</div>
                        <div class="col-md-8">{{ $vendor->description }}</div>
                    </div>
 
                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Tanggal Dibuat</div>
                        <div class="col-md-8">{{ \Carbon\Carbon::parse($vendor->created_at)->format('d F Y H:i') }}</div>
                    </div>
 
                    @if($vendor->image_url)
                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Gambar</div>
                        <div class="col-md-8">
                            <img src="{{ asset($vendor->image_url) }}" alt="Vendor Image" class="img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;">
                        </div>
                    </div>
                    @endif
 
                    <!-- Tombol -->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('vendor.index') }}" class="btn btn-danger">
                            <i class="material-icons me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 

@endsection