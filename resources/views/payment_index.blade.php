@extends('layouts.app_modern', ['title' => 'Data Pembayaran'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pembayaran</h5>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="{{ route('payment.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Order ID</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Metode Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->order->id_order }}</td>
                            <td>Rp {{ number_format($payment->amount, 2, ',', '.') }}</td>
                            <td>{{ ucfirst($payment->status) }}</td>
                            <td>{{ $payment->payment_method }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>
                                <a href="{{ route('payment.edit', $payment->id_payment) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('payment.destroy', $payment->id_payment) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pembayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $payments->links() !!}
        </div>
    </div>
@endsection
