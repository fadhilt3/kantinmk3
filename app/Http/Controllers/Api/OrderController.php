<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Buat order baru (dari keranjang)
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.menu_id' => 'required|exists:menus,id',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        $totalHarga = 0;
        $orderItems = [];

        foreach ($request->items as $item) {
            $menu = Menu::findOrFail($item['menu_id']);
            $harga = $menu->harga * $item['jumlah'];
            $totalHarga += $harga;

            $orderItems[] = [
                'menu_id' => $item['menu_id'],
                'jumlah' => $item['jumlah'],
                'harga' => $harga,
            ];
        }

        $order = Order::create([
            'user_id' => $request->user()->id,
            'status' => 'pending',
            'total_harga' => $totalHarga,
        ]);

        foreach ($orderItems as $item) {
            $order->items()->create($item);
        }

        return response()->json([
            'message' => 'Order berhasil dibuat!',
            'data' => $order->load('items.menu')
        ], 201);
    }

    // Lihat semua order milik user yang login
    public function index(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)
            ->with('items.menu')
            ->latest()
            ->get();

        return response()->json($orders);
    }
}