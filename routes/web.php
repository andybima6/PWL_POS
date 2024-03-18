<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/level', [LevelController::class,'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index'])->name('/user');

// Route::get('/user/tambah', [UserController::class, 'tambah'])->name('/user/tambah');
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('/user/tambah_simpan');
// Route::get('/user/', [UserController::class, 'ubah'])->name('/user/ubah');
// Route::put('/user/ubah_si', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('/user/hapus');

// Praktikum 2 js 5
Route::get('/kategori', [KategoriController::class, 'index']);

// Praktikum 3 js 5
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');;
Route::post('/kategori/create_simpan', [KategoriController::class, 'create_simpan'])->name('/kategori/create_simpan');;

// Tugas 3
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('/kategori/edit');
Route::put('/kategori/edit_simpan/{id}', [KategoriController::class, 'edit_simpan'])->name('/kategori/edit_simpan');

// Tugas 4
Route::get('/kategori/hapus/{id}', [KategoriController::class, 'hapus'])->name('/kategori/hapus');
