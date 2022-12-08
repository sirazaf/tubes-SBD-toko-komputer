<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\DetailTransaksiController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('admin.index');
// });

// auth user
Auth::routes();

Route::get('/',function () {
    return Redirect::to('/admin');
});

//admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('add', [AdminController::class, 'create'])->name('admin.create');
    Route::post('store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::post('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
});

//pembeli
Route::prefix('pembeli')->group(function () {
    Route::get('/', [PembeliController::class, 'index'])->name('pembeli.index');
    Route::get('add', [PembeliController::class, 'create'])->name('pembeli.create');
    Route::post('store', [PembeliController::class, 'store'])->name('pembeli.store');
    Route::get('edit/{id}', [PembeliController::class, 'edit'])->name('pembeli.edit');
    Route::post('update/{id}', [PembeliController::class, 'update'])->name('pembeli.update');
    Route::post('delete/{id}', [PembeliController::class, 'delete'])->name('pembeli.delete');
});

//komputer
Route::prefix('komputer')->group(function () {
    Route::get('/', [KomputerController::class, 'index'])->name('komputer.index');
    Route::get('add', [KomputerController::class, 'create'])->name('komputer.create');
    Route::post('store', [KomputerController::class, 'store'])->name('komputer.store');
    Route::get('edit/{id}', [KomputerController::class, 'edit'])->name('komputer.edit');
    Route::post('update/{id}', [KomputerController::class, 'update'])->name('komputer.update');
    Route::post('delete/{id}', [KomputerController::class, 'delete'])->name('komputer.delete');
});

//detail transaksi
Route::prefix('detail_transaksi')->group(function () {
    Route::get('/', [DetailTransaksiController::class, 'index'])->name('detail_transaksi.index');
    Route::get('add', [DetailTransaksiController::class, 'create'])->name('detail_transaksi.create');
    Route::post('store', [DetailTransaksiController::class, 'store'])->name('detail_transaksi.store');
    Route::get('edit/{id}', [DetailTransaksiController::class, 'edit'])->name('detail_transaksi.edit');
    Route::post('update/{id}', [DetailTransaksiController::class, 'update'])->name('detail_transaksi.update');
    Route::post('delete/{id}', [DetailTransaksiController::class, 'delete'])->name('detail_transaksi.delete');
});