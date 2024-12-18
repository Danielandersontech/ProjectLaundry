@extends('layouts.app_modern', ['title' => 'Data Pengguna'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pengguna</h5>
        <div class="card-body">
            <form action="">
                <div class="row g-3 mb-2">
                    <div class="col">
                        <input type="text" name="q" class="form-control" placeholder="Nama atau Email Pengguna"
                            value="{{ request('q') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">CARI</button>
                    </div>
                </div>
            </form>
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/pengguna/create" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Role</th>
                        <th>Tanggal Daftar</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penggunas as $pengguna)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengguna->nama }}</td>
                            <td>{{ $pengguna->email }}</td>
                            <td>{{ $pengguna->no_hp }}</td>
                            <td>{{ ucfirst($pengguna->role) }}</td>
                            <td>{{ $pengguna->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="/pengguna/{{ $pengguna->id_pengguna }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="/pengguna/{{ $pengguna->id_pengguna }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/pengguna/{{ $pengguna->id_pengguna }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $penggunas->links() !!}
        </div>
    </div>
@endsection
