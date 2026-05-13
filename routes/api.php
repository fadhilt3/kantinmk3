<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes - Aplikasi Kantin
|--------------------------------------------------------------------------
|
| Di sini adalah tempat mendaftarkan route API untuk aplikasi kamu.
| Ingat: Semua route di sini otomatis memiliki prefix "/api".
|
*/

// --- 1. AKSES PUBLIK (Tanpa Login) ---
// Gunakan POST di Postman/Android untuk mengakses ini
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Ambil daftar menu makanan kantin
    Route::get('/menu', [MenuController::class, 'index']);


// --- 2. AKSES PRIVATE (Harus Login / Pakai Token Sanctum) ---
Route::middleware('auth:sanctum')->group(function () {
    
    // Ambil data profil user yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Logout dari aplikasi
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Order
    Route::post('/order', [App\Http\Controllers\Api\OrderController::class, 'store']);
    Route::get('/order', [App\Http\Controllers\Api\OrderController::class, 'index']);

    // Payment
    Route::post('/payment', [App\Http\Controllers\Api\PaymentController::class, 'store']);
    Route::get('/payment', [App\Http\Controllers\Api\PaymentController::class, 'index']);

});

// --- 3. FALLBACK (Opsional) ---
// Supaya kalau kamu buka /api/register di browser (GET), tidak muncul error merah
Route::get('/register', function () {
    return response()->json([
        'success' => false,
        'message' => 'Metode tidak didukung. Silakan gunakan POST melalui Postman atau aplikasi Android.'
    ], 405);
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);