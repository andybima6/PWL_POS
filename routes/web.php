<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\POSController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\LevelController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\kategorisController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\LevelController;
use JeroenNoten\LaravelAdminLte\Http\Controllers\Controller;

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
// Route::put('/user/ubah_simpan{id}', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('/user/hapus');

// Praktikum 2 js 5
Route::get('/kategori', [KategoriController::class, 'index']);

// Praktikum 3 js 5
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');
Route::post('/kategori/create_simpan', [KategoriController::class, 'create_simpan'])->name('/kategori/create_simpan');

// Tugas 3
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('/kategori/edit');
Route::put('/kategori/edit_simpan/{id}', [KategoriController::class, 'edit_simpan'])->name('/kategori/edit_simpan');

// Tugas 4

Route::get('/kategori/hapus/{id}', [kategoriController::class, 'hapus'])->name('/kategori/hapus');


// // LEVEL
// Route::get('/level', [LevelController::class, 'index']);


// Route::get('/level/create', [LevelController::class, 'create'])->name('/level/create');;
// Route::post('/level/create_simpan', [LevelController::class, 'create_simpan'])->name('/level/create_simpan');;

// Route::get('/level/edit/{id}', [LevelController::class, 'edit'])->name('/level/edit');
// Route::put('/level/edit_simpan/{id}', [LevelController::class, 'edit_simpan'])->name('/level/edit_simpan');


// Route::get('/level/hapus/{id}', [LevelController::class, 'hapus'])->name('/level/hapus');

// Route::get('/user', [UserController::class, 'index']);

Route::get('/kategori/hapus/{id}', [KategoriController::class, 'hapus'])->name('/kategori/hapus');


// Praktikum C Jobsheet 6
// Route::get('/user', [UserController::class, 'index'])->name('/user');
// Route::post('/user/create_simpan', [UserController::class, 'create_simpan'])->name('/user/create_simpan');


// Praktikum D Jobsheet 6
Route::resource('m_users', POSController::class);

// Praktikum 2 Jobsheet 7
Route::get('/',[WelcomeController::class,'index']);

// Praktikum 3 Jobsheet 7

Route::group(['prefix' => 'user'], function () {
    route::get('/', [UserController::class, 'index']);
    route::post('/list', [UserController::class, 'list']);
    route::get('/create', [UserController::class, 'create']);
    route::post('/', [UserController::class, 'create_simpan']);
    route::get('/{id}', [UserController::class, 'show']);
    route::get('/{id}/edit', [UserController::class, 'edit']);
    route::put('/{id}', [UserController::class, 'update']);
    route::delete('/{id}', [UserController::class, 'delete']);
});


Route::group(['prefix' => 'levels'], function () {
    route::get('/', [LevelsController::class, 'index']);
    route::post('/list', [LevelsController::class, 'list']);
    route::get('/create', [LevelsController::class, 'create']);
    route::post('/', [LevelsController::class, 'create_simpan']);
    route::get('/{id}', [LevelsController::class, 'show']);
    route::get('/{id}/edit', [LevelsController::class, 'edit']);
    route::put('/{id}', [LevelsController::class, 'update']);
    route::delete('/{id}', [LevelsController::class, 'delete']);
});

Route::group(['prefix' => 'kategoris'], function () {
    route::get('/', [kategorisController::class, 'index']);
    route::post('/list', [kategorisController::class, 'list']);
    route::get('/create', [kategorisController::class, 'create']);
    route::post('/', [kategorisController::class, 'create_simpan']);
    route::get('/{id}', [kategorisController::class, 'show']);
    route::get('/{id}/edit', [kategorisController::class, 'edit']);
    route::put('/{id}', [kategorisController::class, 'update']);
    route::delete('/{id}', [kategorisController::class, 'delete']);
});


Route::group(['prefix' => 'barang'], function () {
    route::get('/', [barangController::class, 'index']);
    route::post('/list', [barangController::class, 'list']);
    route::get('/create', [barangController::class, 'create']);
    route::post('/', [barangController::class, 'create_simpan']);
    route::get('/{id}', [barangController::class, 'show']);
    route::get('/{id}/edit', [barangController::class, 'edit']);
    route::put('/{id}', [barangController::class, 'update']);
    route::delete('/{id}', [barangController::class, 'delete']);
});

Route::group(['prefix' => 'stock'], function () {
    route::get('/', [stockController::class, 'index']);
    route::post('/list', [stockController::class, 'list']);
    route::get('/create', [stockController::class, 'create']);
    route::post('/', [stockController::class, 'create_simpan']);
    route::get('/{id}', [stockController::class, 'show']);
    route::get('/{id}/edit', [stockController::class, 'edit']);
    route::put('/{id}', [stockController::class, 'update']);
    route::delete('/{id}', [stockController::class, 'delete']);
});

Route::group(['prefix' => 'transaksi'], function () {
    route::get('/', [transaksiController::class, 'index']);
    route::post('/list', [transaksiController::class, 'list']);
    route::get('/create', [transaksiController::class, 'create']);
    route::post('/', [transaksiController::class, 'create_simpan']);
    route::get('/{id}', [transaksiController::class, 'show']);
    route::get('/{id}/edit', [transaksiController::class, 'edit']);
    route::put('/{id}', [transaksiController::class, 'update']);
    route::delete('/{id}', [transaksiController::class, 'delete']);
});


Route::get('login',[AuthController::class,'index'])->name('login');
Route::get('register',[AuthController::class,'register'])->name('register');

Route::post('proses_login',[AuthController::class,'proses_login'])->name('proses_login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::post('proses_register',[AuthController::class,'proses_register'])->name('proses_register');


// Kita atur juga untuk middleware menggunakan group pada routing
// Didalamnya terdapat group untuk mengecek kondisi login
// jika user yang loogin merupakan admin maka akan diarahkan ke admincontroller
// jika user yang loogin merupakan manager maka akan diarahkan ke usercontroller

Route::group(['middleware'=>['auth']],function(){
    Route::group(['middleware'=>['cek_login:1']],function(){
        Route::resource('admin',AdminController::class);
    });
    Route::group(['middleware'=>['cek_login:2']],function(){
        Route::resource('manager',ManagerController::class);
});
});

