<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function () {
    Route::get('/menu', [AdminController::class, 'index'])->name('admin.menu.index');
    Route::get('/menu/create', [AdminController::class, 'create'])->name('admin.menu.create');
    Route::post('/menu', [AdminController::class, 'store'])->name('admin.menu.store');
    Route::get('/menu/{id}/edit', [AdminController::class, 'edit'])->name('admin.menu.edit');
    Route::put('/menu/{id}', [AdminController::class, 'update'])->name('admin.menu.update');
    Route::delete('/menu/{id}', [AdminController::class, 'destroy'])->name('admin.menu.destroy');
    Route::get('/order', [AdminController::class, 'orders'])->name('admin.order.index');
    Route::get('/payment', [AdminController::class, 'payments'])->name('admin.payment.index');
});

Route::get('/', function () {
    return view('welcome');
});
