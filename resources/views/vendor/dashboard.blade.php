@extends('layout.v_template')
@section('page')
Daftar Vendor
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-2">Daftar Vendor</h5>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">{{ count($vendors) }} Vendor</span> terdaftar
                            </p>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">

                            <a href="{{ route('vendor.create') }}" class="btn bg-gradient-primary mb-0">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Tambah Vendor
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    @if(session('success'))
                        <div class="alert alert-success mx-3 alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="material-icons">check</i></span>
                            <span class="alert-text">{{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="vendorTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vendor</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lokasi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Mulai</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vendors as $index => $vendor)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset($vendor->image_url) }}" class="avatar avatar-sm me-3 border-radius-lg shadow-sm" alt="{{ $vendor->name }}">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $vendor->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">ID: {{ $vendor->id }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-sm bg-gradient-info">{{ $vendor->category }}</span>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $vendor->location }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-success font-weight-bold mb-0">
                                                Rp {{ number_format($vendor->price_start) }}
                                            </p>
                                        </td>
                                        <td>
                                            <span class="badge badge-sm bg-gradient-{{ $vendor->status == 'aktif' ? 'success' : 'secondary' }}">
                                                {{ $vendor->status }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('vendor.show', $vendor->id) }}" class="btn btn-sm btn-outline-info me-1" data-bs-toggle="tooltip" title="Lihat Detail">
                                                    <i class="material-icons me-1"></i> Detail
                                                </a>
                                                <a href="{{ route('vendor.edit', $vendor->id) }}" class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="tooltip" title="Edit Data">
                                                    <i class="material-icons me-1"></i> Edit
                                                </a>
                                                <form action="{{ route('vendor.destroy', $vendor->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Hapus"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus vendor ini?')">
                                                        <i class="material-icons me-1"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="material-icons text-secondary mb-2" style="font-size: 48px;">inventory</i>
                                                <p class="text-secondary mb-0">Belum ada data vendor</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    border-radius: 15px;
}

.card-header {
    background: transparent;
    border-bottom: 1px solid #eee;
}

.table thead {
    background-color: #f0f2f5;
}

.table thead th {
    border-bottom: 2px solid #dee2e6;
    font-size: 0.75rem;
    color: #6c757d;
}

.table td, .table th {
    border: 1px solid #dee2e6;
    vertical-align: middle;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
}

.avatar {
    width: 40px;
    height: 40px;
    object-fit: cover;
    transition: transform 0.2s;
}

.avatar:hover {
    transform: scale(1.1);
}

.badge {
    padding: 0.55em 0.9em;
    font-size: 0.75em;
    font-weight: 500;
}

.badge.bg-gradient-info {
    background-image: linear-gradient(195deg, #49a3f1, #1A73E8);
}

.badge.bg-gradient-success {
    background-image: linear-gradient(195deg, #66BB6A, #43A047);
}

.btn-sm i {
    vertical-align: middle;
}

.btn-outline-info:hover {
    background-color: #49a3f1;
    color: white;
}

.btn-outline-warning:hover {
    background-color: #fb8c00;
    color: white;
}

.btn-outline-danger:hover {
    background-color: #f44335;
    color: white;
}

.input-group .input-group-text {
    border: 1px solid #d2d6da;
    border-right: none;
    background-color: transparent;
}

.input-group .form-control {
    border-left: none;
}

.input-group .form-control:focus {
    border-color: #d2d6da;
    box-shadow: none;
}

.alert {
    border: 0;
    border-radius: 10px;
}

.alert-success {
    background-image: linear-gradient(195deg, #66BB6A, #43A047);
    color: white;
}

.alert .alert-icon {
    margin-right: 10px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('vendorTable');
    const rows = table.getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function(e) {
        const q = e.target.value.toLowerCase();

        for(let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const text = row.textContent.toLowerCase();

            row.style.display = text.indexOf(q) > -1 ? '' : 'none';
        }
    });
});
</script>
@endsection
