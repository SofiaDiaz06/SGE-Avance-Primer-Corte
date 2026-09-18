<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rutas de Perfil (creadas por Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Módulos del ERP (todos protegidos por auth)
    Route::resource('productos', ProductController::class);
    Route::resource('categorias', CategoryController::class);
    Route::resource('clientes', ClientController::class);
    Route::resource('ventas', SaleController::class);
    Route::resource('proveedores', ProviderController::class);
});

require __DIR__.'/auth.php';