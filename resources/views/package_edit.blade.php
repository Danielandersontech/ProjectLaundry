@extends('layouts.app_modern', ['title' => 'Edit Data Paket'])

@section('content')
    <div class="card">
        <h5 class="card-header">Edit Data Paket: <b>{{ strtoupper($package->nama_paket) }}</b></h5>
        <div class="card-body">
            <form action="/package/{{ $package->id_package }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-1 mb-3">
                    <label for="nama_paket">Nama Paket</label>
                    <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="nama_paket" name="nama_paket" value="{{ old('nama_paket', $package->nama_paket) }}">
                    <span class="text-danger">{{ $errors->first('nama_paket') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi">{{ old('deskripsi', $package->deskripsi) }}</textarea>
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="harga_per_kg">Harga</label>
                    <input type="text" class="form-control @error('harga_per_kg') is-invalid @enderror" id="harga_per_kg" name="harga_per_kg" value="{{ old('harga_per_kg', $package->harga_per_kg) }}">
                    <span class="text-danger">{{ $errors->first('harga_per_kg') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="durasi">Durasi (Hari)</label>
                    <input type="text" class="form-control @error('durasi') is-invalid @enderror" id="durasi" name="durasi" value="{{ old('durasi', $package->durasi) }}">
                    <span class="text-danger">{{ $errors->first('durasi') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
