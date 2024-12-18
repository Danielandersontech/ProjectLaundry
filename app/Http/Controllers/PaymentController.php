<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['payments'] = \App\Models\Payment::latest()->paginate(10);
        return view('payment_index', $data);
    }

    public function create()
    {
        $orders = Order::all(); // Ambil semua data order
        return view('payment_create', compact('orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_order' => 'required|exists:orders,id_order',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Dibayar,Gagal',
            'payment_method' => 'required|string|max:255',
            'payment_date' => 'required|date',
        ]);

        Payment::create($validated);

        return redirect()->route('payment.index')->with('success', 'Payment berhasil dibuat.');
    }

    public function edit(Payment $payment)
    {
        $orders = Order::all();
        return view('payment_edit', compact('payment', 'orders'));
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'id_order' => 'required|exists:orders,id_order',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Dibayar,Gagal',
            'payment_method' => 'required|string|max:255',
            'payment_date' => 'required|date',
        ]);

        $payment->update($validated);

        return redirect()->route('payment.index')->with('success', 'Payment berhasil diperbarui.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return back()->with('success', 'Payment berhasil dihapus.');
    }
}