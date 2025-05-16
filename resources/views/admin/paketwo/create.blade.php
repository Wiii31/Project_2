@extends('layout.v_template')
@section('content')
    <style>
        .custom-card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            border: none;
        }

        .custom-card .card-header {
            border-radius: 18px 18px 0 0;
            background: linear-gradient(90deg, #4e73df 0%, #1cc88a 100%);
            color: #fff;
            padding: 24px 32px;
        }

        .custom-card .card-body {
            padding: 32px;
        }

        .form-floating>.form-control,
        .form-floating>.form-control:focus {
            border-radius: 12px;
            border: 1px solid #d1d3e2;
        }

        .btn-success {
            background: linear-gradient(90deg, #1cc88a 0%, #4e73df 100%);
            border: none;
            font-weight: bold;
            padding: 10px 32px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .btn-success:hover {
            background: linear-gradient(90deg, #4e73df 0%, #1cc88a 100%);
            color: #fff;
        }

        .btn-outline-secondary {
            border-radius: 8px;
            padding: 10px 32px;
        }
    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">Tambah Paket WO</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                        </div>
                        <form action="{{ route('paket-wo.store') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" name="nama_paket" class="form-control" id="namaPaket"
                                    placeholder="Nama Paket" required>
                                <label for="namaPaket">Nama Paket</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga"
                                    required>
                                <label for="harga">Harga</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi" style="height: 120px" required></textarea>
                                <label for="deskripsi">Deskripsi</label>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('paket-wo.index') }}" class="btn btn-outline-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
