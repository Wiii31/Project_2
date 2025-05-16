@extends('layout.v_template')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="mb-0">Edit User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id_akun) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $user->nama) }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username', $user->username) }}" required>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Password (kosongkan jika tidak ingin mengubah)</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Role</label>
                                <select name="tipe_akun" class="form-control @error('tipe_akun') is-invalid @enderror"
                                    required>
                                    <option value="">Pilih Role</option>
                                    <option value="admin"
                                        {{ old('tipe_akun', $user->tipe_akun) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user"
                                        {{ old('tipe_akun', $user->tipe_akun) == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="vendor"
                                        {{ old('tipe_akun', $user->tipe_akun) == 'vendor' ? 'selected' : '' }}>Vendor
                                    </option>
                                </select>
                                @error('tipe_akun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
