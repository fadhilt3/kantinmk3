<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan semua category
    public function index()
    {
        return Category::all();
    }

    // Menambahkan category baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Category berhasil ditambahkan',
            'data' => $category
        ]);
    }

    // Menampilkan category berdasarkan id
    public function show(Category $category)
    {
        return response()->json($category);
    }

    // Update category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Category berhasil diupdate',
            'data' => $category
        ]);
    }

    // Hapus category
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'Category berhasil dihapus'
        ]);
    }
}