@extends('layouts.app_modern', ['title' => 'Buat Order Baru'])

@section('content')
<div class="card">
    <div class="card-header">FORM ORDER</div>
    <div class="card-body">
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="id_pengguna">Pengguna
                    | <a href="/pengguna/create" target="blank">Pengguna Baru</a>
                </label>
                <select name="id_pengguna" class="form-control select2" data-placeholder="Cari Nama Pengguna..." style="width: 100%">
                    <option value="">-- Pilih Pengguna --</option>
                    @foreach ($listPengguna as $pengguna)
                        <option value="{{ $pengguna->id_pengguna }}">{{ $pengguna->id_pengguna }} - {{ $pengguna->nama }}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('id_pengguna') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="id_package">Paket</label>
                <select name="id_package" class="form-control select2" data-placeholder="Cari Nama Pengguna..." style="width: 100%">
                    <option value="">-- Pilih Paket --</option>
                    @foreach ($listPackage as $package)
                        <option value="{{ $package->id_package }}">{{ $package->nama_paket }} - {{ $package->harga }}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('id_package') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="berat_kg">Berat (Kg)</label>
                <input type="number" name="berat_kg" class="form-control" step="0.1" min="0" value="{{ old('berat_kg') }}">
                <span class="text-danger">{{ $errors->first('berat_kg') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="tgl_order">Tanggal Order</label>
                <input type="datetime-local" name="tgl_order" class="form-control" value="{{ old('tgl_order') }}">
                <span class="text-danger">{{ $errors->first('tgl_order') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="Pending">Pending</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Dibatalkan">Dibatalkan</option>
                </select>
                <span class="text-danger">{{ $errors->first('status') }}</span>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
</div>
@endsection
