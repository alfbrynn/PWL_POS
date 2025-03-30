<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SuplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Database\Seeders\KategoriSeeder;

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']); // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']); // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']); // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']); // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
});

// route untuk crud tabel m_level
Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']); // menampilkan halaman awal level
    Route::post('/list', [LevelController::class, 'list']); // menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class, 'create']); // menampilkan form tambah level
    Route::post('/', [LevelController::class, 'store']); // menyimpan data level baru
    Route::get('/{id}', [LevelController::class, 'show']); // menampilkan detail level
    Route::get('/{id}/edit', [LevelController::class, 'edit']); // menampilkan halaman form edit level
    Route::put('/{id}', [LevelController::class, 'update']); // menyimpan perubahan data level
    Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data level
});

// route untuk crud tabel m_kategori
Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']); // menampilkan halaman awal level
    Route::post('/list', [KategoriController::class, 'list']); // menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create', [KategoriController::class, 'create']); // menampilkan form tambah level
    Route::post('/', [KategoriController::class, 'store']); // menyimpan data level baru
    Route::get('/{id}', [KategoriController::class, 'show']); // menampilkan detail level
    Route::get('/{id}/edit', [KategoriController::class, 'edit']); // menampilkan halaman form edit level
    Route::put('/{id}', [KategoriController::class, 'update']); // menyimpan perubahan data level
    Route::delete('/{id}', [KategoriController::class, 'destroy']); // menghapus data level
});

// route untuk crud tabel m_suplier
Route::group(['prefix' => 'suplier'], function () {
    Route::get('/', [SuplierController::class, 'index']); // menampilkan halaman awal level
    Route::post('/list', [SuplierController::class, 'list']); // menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create', [SuplierController::class, 'create']); // menampilkan form tambah level
    Route::post('/', [SuplierController::class, 'store']); // menyimpan data level baru
    Route::get('/{id}', [SuplierController::class, 'show']); // menampilkan detail level
    Route::get('/{id}/edit', [SuplierController::class, 'edit']); // menampilkan halaman form edit level
    Route::put('/{id}', [SuplierController::class, 'update']); // menyimpan perubahan data level
    Route::delete('/{id}', [SuplierController::class, 'destroy']); // menghapus data level
});

// route untuk crud tabel m_barang
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']); // menampilkan halaman awal level
    Route::post('/list', [BarangController::class, 'list']); // menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create', [BarangController::class, 'create']); // menampilkan form tambah level
    Route::post('/', [BarangController::class, 'store']); // menyimpan data level baru
    Route::get('/{id}', [BarangController::class, 'show']); // menampilkan detail level
    Route::get('/{id}/edit', [BarangController::class, 'edit']); // menampilkan halaman form edit level
    Route::put('/{id}', [BarangController::class, 'update']); // menyimpan perubahan data level
    Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data level
});
