@extends('layouts.app_modern', ['title' => 'Tambah Data Pengguna'])

@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Data Pengguna</h5>
        <div class="card-body">
            <form action="/pengguna" method="POST">
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama Pengguna</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="no_hp">No. HP</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="role">Role</label>
                    <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                        <option value="">-- Pilih Role --</option>
                        <option value="pelanggan" {{ old('role') == 'pelanggan' ? 'selected' : '' }}>Pelanggan</option>
                        <option value="pemilik_laundry" {{ old('role') == 'pemilik_laundry' ? 'selected' : '' }}>Pemilik Laundry</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('role') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
