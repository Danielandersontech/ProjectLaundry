@extends('layouts.app_modern', ['title' => 'Edit Pembayaran'])

@section('content')
<div class="card">
    <div class="card-header">EDIT PEMBAYARAN</div>
    <div class="card-body">
        <form action="{{ route('payment.update', $payment->id_payment) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mt-3">
                <label for="id_order">Order</label>
                <select name="id_order" class="form-control">
                    @foreach ($orders as $order)
                    <option value="{{ $order->id_order }}" @selected($payment->id_order == $order->id_order)>{{ $order->id_order }}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('id_order') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="amount">Jumlah</label>
                <input type="number" name="amount" class="form-control" value="{{ $payment->amount }}" step="0.01" min="0">
                <span class="text-danger">{{ $errors->first('amount') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="Pending" @selected($payment->status == 'Pending')>Pending</option>
                    <option value="Dibayar" @selected($payment->status == 'Dibayar')>Dibayar</option>
                    <option value="Gagal" @selected($payment->status == 'Gagal')>Gagal</option>
                </select>
                <span class="text-danger">{{ $errors->first('status') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="payment_method">Metode Pembayaran</label>
                <input type="text" name="payment_method" class="form-control" value="{{ $payment->payment_method }}">
                <span class="text-danger">{{ $errors->first('payment_method') }}</span>
            </div>

            <div class="form-group mt-3">
                <label for="payment_date">Tanggal Pembayaran</label>
                <input type="datetime-local" name="payment_date" class="form-control" value="{{ $payment->payment_date }}">
                <span class="text-danger">{{ $errors->first('payment_date') }}</span>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>
@endsection
