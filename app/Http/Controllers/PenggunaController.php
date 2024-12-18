<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index()
    {
        if (request()->filled('q')){
            $data['penggunas'] = Pengguna::search(request('q'))->paginate(10);
        } else {
            $data['penggunas'] = Pengguna::latest()->paginate(10);
        }
        return view('pengguna_index', $data);
    }

    public function create()
    {
        return view('pengguna_create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email|unique:penggunas,email',
            'password' => 'required|min:8',
            'no_hp' => 'required|numeric',
            'alamat' => 'nullable',
            'role' => 'required|in:pelanggan,pemilik_laundry',
        ]);

        $requestData['password'] = bcrypt($requestData['password']); // Encrypt password
        Pengguna::create($requestData);

        flash('Data pengguna berhasil disimpan.')->success();
        return redirect('/pengguna');
    }

    public function show(string $id)
    {
        $data['pengguna'] = Pengguna::findOrFail($id);
        return view('pengguna_show', $data);
    }

    public function edit(string $id)
    {
        $data['pengguna'] = Pengguna::findOrFail($id);
        return view('pengguna_edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email|unique:penggunas,email,' . $id . ',id_pengguna',
            'password' => 'nullable|min:8',
            'no_hp' => 'required|numeric',
            'alamat' => 'nullable',
            'role' => 'required|in:pelanggan,pemilik_laundry',
        ]);

        if (!empty($requestData['password'])) {
            $requestData['password'] = bcrypt($requestData['password']); // Encrypt new password
        } else {
            unset($requestData['password']);
        }

        $pengguna->update($requestData);

        flash('Data pengguna berhasil diperbarui.')->success();
        return redirect('/pengguna');
    }

    public function destroy(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        // Check if the pengguna is associated with orders
        if ($pengguna->orders->count() > 0) {
            flash('Data tidak dapat dihapus karena terkait dengan data pesanan.')->error();
            return back();
        }

        $pengguna->delete();

        flash('Data pengguna berhasil dihapus.')->success();
        return back();
    }
}
