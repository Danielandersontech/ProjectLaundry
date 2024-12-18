@extends('layouts.app_modern', ['title' => 'Buat Pembayaran Baru'])

@section('content')
<div class="card">
    <div class="card-header">FORM PEMBAYARAN</div>
    <div class="card-body">
        <form action="{{ route('payment.store') }}" method="POST">
            @csrf
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
                <label for="amount">Jumlah</label>
                <input type="number" name="amount" class="form-control" step="0.01" min="0" value="{{ old('amount') }}">
                <span class="text-danger">{{ $errors->first('amount') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="Pending">Pending</option>
                    <option value="Dibayar">Dibayar</option>
                    <option value="Gagal">Gagal</option>
                </select>
                <span class="text-danger">{{ $errors->first('status') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="payment_method">Metode Pembayaran</label>
                <input type="text" name="payment_method" class="form-control" value="{{ old('payment_method') }}">
                <span class="text-danger">{{ $errors->first('payment_method') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="payment_date">Tanggal Pembayaran</label>
                <input type="datetime-local" name="payment_date" class="form-control" value="{{ old('payment_date') }}">
                <span class="text-danger">{{ $errors->first('payment_date') }}</span>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
</div>
@endsection
