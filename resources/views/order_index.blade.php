@extends('layouts.app_modern', ['title' => 'Data Pesanan'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pesanan</h5>
        <div class="card-body">
            <form action="">
                <div class="row g-3 mb-2">
                    <div class="col">
                        <input type="text" name="q" class="form-control" placeholder="Nama Pengguna"
                            value="{{ request('q') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">CARI</button>
                    </div>
                </div>
            </form>
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/order/create" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Pelanggan</th>
                        <th>Paket Layanan</th>
                        <th>Berat (kg)</th>
                        <th>Subtotal</th>
                        <th>Status</th>
                        <th>Tanggal Pesanan</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->pengguna->nama }}</td>
                            <td>{{ $order->package->nama_paket }}</td>
                            <td>{{ $order->berat_kg }}</td>
                            <td>Rp {{ number_format($order->subtotal, 2, ',', '.') }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ $order->tgl_order }}</td>
                            <td>
                                <a href="/order/{{ $order->id_order }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="/order/{{ $order->id_order }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/order/{{ $order->id_order }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data pesanan.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            {!! $orders->links() !!}
        </div>
    </div>
@endsection
