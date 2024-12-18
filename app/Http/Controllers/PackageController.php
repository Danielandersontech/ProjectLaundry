<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $data['packages'] = Package::latest()->paginate(10);
        return view('package_index', $data);
    }

    public function create()
    {
        return view('package_create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama_paket' => 'required|min:3',
            'deskripsi' => 'nullable',
            'harga_per_kg' => 'required|numeric',
            'durasi' => 'required|numeric',
        ]);
        Package::create($requestData);

        flash('Data paket berhasil disimpan.')->success();
        return redirect('/package');
    }

    public function show(string $id)
    {
        $data['package'] = Package::findOrFail($id);
        return view('package_show', $data);
    }

    public function edit(string $id)
    {
        $data['package'] = Package::findOrFail($id);
        return view('package_edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $package = Package::findOrFail($id);

        $requestData = $request->validate([
            'nama_paket' => 'required|min:3',
            'deskripsi' => 'nullable',
            'harga_per_kg' => 'required|numeric',
            'durasi' => 'required|numeric',
        ]);

        $package->update($requestData);

        flash('Data paket berhasil diperbarui.')->success();
        return redirect('/package');
    }

    public function destroy(string $id)
    {
        $package = Package::findOrFail($id);

        $package->delete();

        flash('Data paket berhasil dihapus.')->success();
        return back();
    }
}
