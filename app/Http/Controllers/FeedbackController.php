<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Order;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $data['feedbacks'] = Feedback::latest()->paginate(10);
        return view('feedback_index', $data);
    }

    public function create()
    {
        $penggunas = Pengguna::all(); // Ambil semua data Pengguna
        $orders = Order::all(); // Ambil semua data order
        return view('feedback_create', compact('penggunas', 'orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pengguna' => 'required|exists:penggunas,id_pengguna',
            'id_order' => 'required|exists:orders,id_order',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        Feedback::create($validated);

        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil dibuat.');
    }

    public function edit(Feedback $feedback)
    {
        $penggunas = Pengguna::all();
        $orders = Order::all();
        return view('feedback_edit', compact('feedback', 'penggunas', 'orders'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $validated = $request->validate([
            'id_pengguna' => 'required|exists:penggunas,id_pengguna',
            'id_order' => 'required|exists:orders,id_order',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        $feedback->update($validated);

        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil diperbarui.');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return back()->with('success', 'Feedback berhasil dihapus.');
    }
}
