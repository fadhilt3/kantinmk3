<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // Ambil semua favorit user
    public function index(Request $request)
    {
        $favorites = Favorite::with('menu')
            ->where('user_id', $request->user()->id)
            ->get();

        return response()->json($favorites->map(fn($f) => $f->menu));
    }

    // Toggle favorit (tambah/hapus)
    public function toggle(Request $request, $menuId)
    {
        $userId = $request->user()->id;

        $existing = Favorite::where('user_id', $userId)
            ->where('menu_id', $menuId)
            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['status' => 'removed']);
        }

        Favorite::create([
            'user_id' => $userId,
            'menu_id' => $menuId,
        ]);

        return response()->json(['status' => 'added']);
    }

    // Cek apakah menu sudah difavoritkan
    public function check(Request $request, $menuId)
    {
        $isFavorite = Favorite::where('user_id', $request->user()->id)
            ->where('menu_id', $menuId)
            ->exists();

        return response()->json(['is_favorite' => $isFavorite]);
    }
}