<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KalkulatorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UsersControler;
use App\Http\Controllers\TransOrderController;

// databse
// model -> sesuai daengan nama kolom
// controller -> sesuai dengan nama tabel
// routing

Route::get('/', [LoginController::class, 'index'])->name('/');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('actionRegister', [RegisterController::class, 'actionRegister'])->name('actionRegister');

// grouping routing setelah login
Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', UsersControler::class);
    Route::resource('service', ServiceController::class);
    Route::resource('customer', CustomersController::class);
    Route::resource('level', LevelController::class);
    Route::resource('trans_order', TransOrderController::class);
    Route::get('getPaket/{id}', [TransOrderController::class, 'getPaket'])->name('getPaket');
});

Route::get('latihan', [LatihanController::class, 'index']);
Route::get('edit/{id}', [LatihanController::class, 'edit']);
Route::get('delete/{id}', [LatihanController::class, 'delete']);
Route::get('kalkulator', [KalkulatorController::class, 'index']);
Route::get('tambah', [KalkulatorController::class, 'tambah'])->name('tambah');
Route::get('kurang', [KalkulatorController::class, 'kurang'])->name('kurang');
Route::get('kali', [KalkulatorController::class, 'kali'])->name('kali');
Route::get('bagi', [KalkulatorController::class, 'bagi'])->name('bagi');
Route::post('store-tambah', [KalkulatorController::class, 'storeTambah'])->name('store-tambah');
Route::post('store-kurang', [KalkulatorController::class, 'storeKurang'])->name('store-kurang');
Route::post('store-kali', [KalkulatorController::class, 'storeKali'])->name('store-kali');
Route::post('store-bagi', [KalkulatorController::class, 'storeBagi'])->name('store-bagi');

Route::get('delete/{id}', [UsersControler::class, 'delete'])->name('delete');
