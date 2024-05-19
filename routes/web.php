<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\LombaController;
use App\Models\Beasiswa;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('beasiswas', BeasiswaController::class);
Route::resource('lombas', LombaController::class);
Route::resource('lokers', LokerController::class);
