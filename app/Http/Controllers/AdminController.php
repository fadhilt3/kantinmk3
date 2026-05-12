<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Tampilkan semua menu
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index', compact('menus'));
    }

    // Form tambah menu
    public function create()
    {
        return view('admin.menu.create');
    }

    // Simpan menu baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        Menu::create($request->all());
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    // Form edit menu
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    // Update menu
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diupdate!');
    }

    // Hapus menu
    public function destroy($id)
    {
        Menu::findOrFail($id)->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus!');
    }
    
    // Tampilkan semua order
    public function orders()
    {
        $orders = \App\Models\Order::with('items.menu', 'user')->latest()->get();
        return view('admin.order.index', compact('orders'));
    }
}