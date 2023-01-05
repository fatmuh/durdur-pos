<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PemasukanController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'grafik']);

Route::middleware(['auth'])->group(function () {
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/update', [ProfileController::class, 'update'])->name('update');

Route::get('/settings', [UpdatePasswordController::class, 'settings'])->name('settings');
Route::put('/settings', [UpdatePasswordController::class, 'update']);

Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran');
Route::put('/store-pengeluaran', [PengeluaranController::class, 'store'])->name('store-pengeluaran');
Route::put('/update-pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('update-pengeluaran');
Route::put('/delete-pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('delete-pengeluaran');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::put('/store-produk', [ProdukController::class, 'store'])->name('store-produk');
Route::put('/update-produk/{id}', [ProdukController::class, 'update'])->name('update-produk');
Route::put('/delete-produk/{id}', [ProdukController::class, 'destroy'])->name('delete-produk');
Route::put('/update-stock/{id}', [ProdukController::class, 'add_stock'])->name('update-produk');

Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan');
Route::put('/store-pemasukan', [PemasukanController::class, 'store'])->name('store-pemasukan');
Route::put('/delete-pemasukan/{id}', [PemasukanController::class, 'destroy'])->name('delete-pemasukan');
});
