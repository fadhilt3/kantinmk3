<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Bayar order
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
        ]);

        $order = Order::findOrFail($request->order_id);

        // Cek apakah sudah dibayar
        if ($order->status == 'paid') {
            return response()->json(['message' => 'Order sudah dibayar!'], 400);
        }

        // Buat payment
        $payment = Payment::create([
            'order_id' => $order->id,
            'jumlah_bayar' => $order->total_harga,
            'status' => 'paid'
        ]);

        // Update status order
        $order->update(['status' => 'paid']);

        return response()->json([
            'message' => 'Pembayaran berhasil!',
            'data' => $payment->load('order')
        ], 201);
    }

    // Lihat semua payment milik user
    public function index(Request $request)
    {
        $payments = Payment::whereHas('order', function ($q) use ($request) {
            $q->where('user_id', $request->user()->id);
        })->with('order.items.menu')->latest()->get();

        return response()->json($payments);
    }
}