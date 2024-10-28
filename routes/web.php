<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('register', [RegisterController::class, 'index'])->name('register'); 
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'process'])->name('login.process');

Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('users', function(){
    return view('users.index');
})->name('users')->middleware('auth');

Route::get('mobil', function(){
    return view('mobil.index');
})->name('mobil')->middleware('auth');

Route::get('transaksi', function() {
    return view('transaksi.index');
})->name('transaksi')->middleware('auth');

Route::get('laporan', function() {
    return view('laporan.index');
})->name('laporan')->middleware('auth');

