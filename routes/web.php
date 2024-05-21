<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\LombaController;

use Illuminate\Support\Facades\Auth;


// Guest
Route::get('/', [GuestController::class, 'indexwelcome'])->name('guest.welcome');
Route::get('/', [GuestController::class, 'indexwelcome'])->name('indexwelcome');
Route::get('/guest/beasiswa', [GuestController::class, 'indexbeasiswa'])->name('guest.beasiswa');
Route::get('/guest/lomba', [GuestController::class, 'indexlomba'])->name('guest.lomba');
Route::get('/guest/loker', [GuestController::class, 'indexloker'])->name('guest.loker');
Route::get('/guest/detail-beasiswa/{id}', [GuestController::class, 'infobeasiswa'])->name('guest.detail_beasiswa');
Route::get('/guest/detail-lomba/{id}', [GuestController::class, 'infoLomba'])->name('guest.detail_lomba');
Route::get('/guest/detail-loker/{id}', [GuestController::class, 'infoloker'])->name('guest.detail_loker');



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('beasiswas', BeasiswaController::class);
    Route::resource('lombas', LombaController::class);
    Route::resource('lokers', LokerController::class);
});




