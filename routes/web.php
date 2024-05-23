<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OngkirController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/Dashboard', [AdminController::class, 'showAdmin'])->name('admin.page');
    Route::resource('products', ProductController::class);
    Route::get('/Data_Produk',[ProductController::class,'index'])->name('product.page');
    Route::resource('users', AdminController::class);
    Route::get('/Data_Admin',[AdminController::class,'index'])->name('dataadmin.page');
    Route::resource('customer', PelangganController::class);
    Route::get('/Data_Pelanggan', [PelangganController::class, 'index'])->name('datapelanggan.page');
    Route::get('/Data_Ongkir',[OngkirController::class,'index'])->name('ongkir.page');
    Route::resource('ongkirs', OngkirController::class);
});

// Route::middleware(['auth', 'isAdmin'])->group(function(){
//     Route::get('/Dashboard',[AdminController::class,'showAdmin'])->name('admin.page');
//     Route::get('/Data_Produk',[ProductController::class,'showProduct'])->name('product.page');
//     Route::get('/Tambah_Produk',[ProductController::class,'showCreate'])->name('addproduct.page');
//     // Route::resource('products', ProductController::class);
//     // Route::post('/Store_Produk', [ProductController::class, 'store'])->name('store.product');
//     // Route::get('/Edit_Produk/{id}', [ProductController::class, 'edit'])->name('edit.product.page');
//     // Route::post('/Update_Produk/{id}', [ProductController::class, 'update'])->name('update.product');
//     // Route::delete('/Delete_Produk/{id}', [ProductController::class, 'destroy'])->name('delete.product');
// });

// Route::middleware(['auth', 'isPelanggan'])->group(function(){
//     Route::get('/pelanggan/index',[PelangganController::class,'showPelanggan'])->name('pelanggan.page');
// });

require __DIR__.'/auth.php';
