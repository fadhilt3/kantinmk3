<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            ['nama_menu' => 'Nasi Goreng Spesial', 'harga' => 13000, 'stok' => 20, 'kategori' => 'Nasi'],
            ['nama_menu' => 'Nasi Padang Lengkap', 'harga' => 15000, 'stok' => 20, 'kategori' => 'Nasi'],
            ['nama_menu' => 'Mie Ayam Bakso', 'harga' => 12000, 'stok' => 20, 'kategori' => 'Mie'],
            ['nama_menu' => 'Mie Goreng Seafood', 'harga' => 15000, 'stok' => 20, 'kategori' => 'Mie'],
            ['nama_menu' => 'Soto Ayam', 'harga' => 11000, 'stok' => 20, 'kategori' => 'Kuah'],
            ['nama_menu' => 'Bakso Urat', 'harga' => 12000, 'stok' => 20, 'kategori' => 'Kuah'],
            ['nama_menu' => 'Ayam Bakar Kecap', 'harga' => 18000, 'stok' => 20, 'kategori' => 'Lauk'],
            ['nama_menu' => 'Pecel Lele', 'harga' => 14000, 'stok' => 20, 'kategori' => 'Lauk'],
            ['nama_menu' => 'Gado-gado Komplit', 'harga' => 10000, 'stok' => 20, 'kategori' => 'Sayur'],
            ['nama_menu' => 'Es Teh Manis', 'harga' => 5000, 'stok' => 50, 'kategori' => 'Minuman'],
            ['nama_menu' => 'Jus Alpukat', 'harga' => 10000, 'stok' => 50, 'kategori' => 'Minuman'],
            ['nama_menu' => 'Es Campur', 'harga' => 8000, 'stok' => 50, 'kategori' => 'Minuman'],
            ['nama_menu' => 'Kopi Susu', 'harga' => 8000, 'stok' => 50, 'kategori' => 'Minuman'],
            ['nama_menu' => 'Pisang Goreng', 'harga' => 7000, 'stok' => 30, 'kategori' => 'Snack'],
            ['nama_menu' => 'Martabak Mini', 'harga' => 8000, 'stok' => 30, 'kategori' => 'Snack'],
            ['nama_menu' => 'Cireng Isi', 'harga' => 5000, 'stok' => 30, 'kategori' => 'Snack'],
        ];

        Menu::insert($menus);
    }
}