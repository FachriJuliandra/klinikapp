<?php

use Illuminate\Support\Facades\Route;

Route::resource('poli', App\Http\Controllers\PoliController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('pasien', App\Http\Controllers\PasienController::class);
});

Route::resource('pasien', App\Http\Controllers\PasienController::class);

Route::resource('daftar', App\Http\Controllers\DaftarController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
