<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Menu::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $menus = [
            ['nama_menu' => 'Nasi Goreng Spesial', 'harga' => 13000, 'stok' => 20, 'kategori' => 'Nasi', 'foto' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=400'],
            ['nama_menu' => 'Nasi Padang Lengkap', 'harga' => 15000, 'stok' => 20, 'kategori' => 'Nasi', 'foto' => 'https://images.unsplash.com/photo-1574484284002-952d92456975?w=400'],
            ['nama_menu' => 'Mie Ayam Bakso', 'harga' => 12000, 'stok' => 20, 'kategori' => 'Mie', 'foto' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=400'],
            ['nama_menu' => 'Mie Goreng Seafood', 'harga' => 15000, 'stok' => 20, 'kategori' => 'Mie', 'foto' => 'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=400'],
            ['nama_menu' => 'Soto Ayam', 'harga' => 11000, 'stok' => 20, 'kategori' => 'Kuah', 'foto' => 'https://images.unsplash.com/photo-1547592166-23ac45744acd?w=400'],
            ['nama_menu' => 'Bakso Urat', 'harga' => 12000, 'stok' => 20, 'kategori' => 'Kuah', 'foto' => 'https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=400'],
            ['nama_menu' => 'Ayam Bakar Kecap', 'harga' => 18000, 'stok' => 20, 'kategori' => 'Lauk', 'foto' => 'https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?w=400'],
            ['nama_menu' => 'Pecel Lele', 'harga' => 14000, 'stok' => 20, 'kategori' => 'Lauk', 'foto' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=400'],
            ['nama_menu' => 'Gado-gado Komplit', 'harga' => 10000, 'stok' => 20, 'kategori' => 'Sayur', 'foto' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=400'],
            ['nama_menu' => 'Es Teh Manis', 'harga' => 5000, 'stok' => 50, 'kategori' => 'Minuman', 'foto' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=400'],
            ['nama_menu' => 'Jus Alpukat', 'harga' => 10000, 'stok' => 50, 'kategori' => 'Minuman', 'foto' => 'https://images.unsplash.com/photo-1623065422902-30a2d299bbe4?w=400'],
            ['nama_menu' => 'Es Campur', 'harga' => 8000, 'stok' => 50, 'kategori' => 'Minuman', 'foto' => 'https://images.unsplash.com/photo-1497534446932-c925b458314e?w=400'],
            ['nama_menu' => 'Kopi Susu', 'harga' => 8000, 'stok' => 50, 'kategori' => 'Minuman', 'foto' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=400'],
            ['nama_menu' => 'Pisang Goreng', 'harga' => 7000, 'stok' => 30, 'kategori' => 'Snack', 'foto' => 'https://images.unsplash.com/photo-1481349518771-20055b2a7b24?w=400'],
            ['nama_menu' => 'Martabak Mini', 'harga' => 8000, 'stok' => 30, 'kategori' => 'Snack', 'foto' => 'https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=400'],
            ['nama_menu' => 'Cireng Isi', 'harga' => 5000, 'stok' => 30, 'kategori' => 'Snack', 'foto' => 'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=400'],
        ];

        Menu::insert($menus);
    }
}