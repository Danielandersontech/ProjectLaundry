<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Pengguna;
use App\Models\Package;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->filled('q')){
            $data['orders'] = Order::search(request('q'))->paginate(10);
        } else {
            $data['orders'] = Order::latest()->paginate(10);
        }
        return view('order_index', $data);
    }

    public function create()
    {
        $listPengguna = Pengguna::all(); // Ambil semua data pengguna
        $listPackage = Package::all();  // Ambil semua data package

        return view('order_create', [
            'listPengguna' => $listPengguna,
            'listPackage' => $listPackage
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pengguna' => 'required|exists:penggunas,id_pengguna',
            'id_package' => 'required|exists:packages,id_package',
            'berat_kg' => 'required|numeric|min:0',
            'tgl_order' => 'required|date',
            'status' => 'required|in:Pending,Selesai,Dibatalkan',
        ]);

        $subtotal = Package::find($validated['id_package'])->harga_per_kg * $validated['berat_kg'];

        Order::create([
            'id_pengguna' => $validated['id_pengguna'],
            'id_package' => $validated['id_package'],
            'berat_kg' => $validated['berat_kg'],
            'subtotal' => $subtotal,
            'tgl_order' => $validated['tgl_order'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('order.index')->with('success', 'Order berhasil dibuat.');
    }

    public function edit(Order $order)
    {
        $listPengguna = Pengguna::all();
        $listPackage = Package::all();

        return view('order_edit', [
            'order' => $order,
            'listPengguna' => $listPengguna,
            'listPackage' => $listPackage
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'id_pengguna' => 'required|exists:penggunas,id_pengguna',
            'id_package' => 'required|exists:packages,id_package',
            'berat_kg' => 'required|numeric|min:0',
            'tgl_order' => 'required|date',
            'status' => 'required|in:Pending,Selesai,Dibatalkan',
        ]);

        $subtotal = Package::find($validated['id_package'])->harga * $validated['berat_kg'];

        $order->update([
            'id_pengguna' => $validated['id_pengguna'],
            'id_package' => $validated['id_package'],
            'berat_kg' => $validated['berat_kg'],
            'subtotal' => $subtotal,
            'status' => $validated['status'],
        ]);

        return redirect()->route('order.index')->with('success', 'Order berhasil diperbarui.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', 'Order berhasil dihapus.');
    }
}
