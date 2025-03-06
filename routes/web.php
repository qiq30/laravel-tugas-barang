<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

// Langsung ke daftar barang saat membuka Laravel
Route::get('/', [BarangController::class, 'index']);

// Route untuk CRUD Barang
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/tambah', [BarangController::class, 'create']);
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/edit/{id}', [BarangController::class, 'edit']);
Route::post('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::get('/barang/hapus/{id}', [BarangController::class, 'destroy']);
