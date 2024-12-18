@extends('layouts.app_modern', ['title' => 'Buat Feedback Baru'])

@section('content')
<div class="card">
    <div class="card-header">FORM FEEDBACK</div>
    <div class="card-body">
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="id_pengguna">Pengguna</label>
                <select name="id_pengguna" class="form-control">
                    <option value="">-- Pilih Pengguna --</option>
                    @foreach ($penggunas as $pengguna)
                        <option value="{{ $pengguna->id_pengguna }}">{{ $pengguna->id_pengguna }} - {{ $pengguna->nama }}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('id_pengguna') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="id_order">Order</label>
                <select name="id_order" class="form-control">
                    <option value="">-- Pilih Order --</option>
                    @foreach ($orders as $order)
                        <option value="{{ $order->id_order }}">{{ $order->id_order }}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('id_order') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="rating">Rating</label>
                <input type="number" name="rating" class="form-control" min="1" max="5" value="{{ old('rating') }}">
                <span class="text-danger">{{ $errors->first('rating') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="komentar">Komentar</label>
                <textarea name="komentar" class="form-control">{{ old('komentar') }}</textarea>
                <span class="text-danger">{{ $errors->first('komentar') }}</span>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
</div>
@endsection
