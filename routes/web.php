<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{GuzzleController, AuthController, DashboardController, AkunController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/all-complaint', [GuzzleController::class, 'index'])->name('all.complaint');
Route::get('/create', [GuzzleController::class, 'create'])->name('create.complaint');
Route::post('/store-complaint', [GuzzleController::class, 'store'])->name('store.complaint');
Route::get('/detail-complaint/{id}', [GuzzleController::class, 'detail'])->name('detail.complaint');

Route::get('/dashboard-user', [DashboardController::class, 'index'])->name('dashboard.user');
Route::get('/akun-user', [AkunController::class, 'index'])->name('akun.user');

Route::get('login', [AuthController::class, 'login']);
Route::post('login/store', [AuthController::class, 'store'])->name('login.store');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
