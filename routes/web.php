<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GuzzleController,
    DashboardController, 
    AkunController,
    LoginController,
    LogoutController,
    RegisterController,
    AuthController, 
};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/all-complaint', [GuzzleController::class, 'index'])->name('all.complaint');
Route::get('/detail-complaint/{id}', [GuzzleController::class, 'detail'])->name('detail.complaint');

Route::middleware('checkSessionMiddleware')->group(function () {
    Route::get('/create', [GuzzleController::class, 'create'])->name('create.complaint');
    Route::post('/store-complaint', [GuzzleController::class, 'store'])->name('store.complaint');
    Route::get('/dashboard-user', [DashboardController::class, 'index'])->name('dashboard.user');
    Route::get('/akun-user', [AkunController::class, 'index'])->name('akun.user');
    Route::post('/photo', [AkunController::class, 'photo'])->name('photo.user');
    // Route::get('logout-user', [AuthController::class, 'logout'])->name('logout.user');
    Route::get('logout-user', [LogoutController::class, 'logout'])->name('logout.user');
});

Route::middleware('isAuthenticatedMiddleware')->group(function () {
    Route::get('login', [LoginController::class, 'login']);
    Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
    Route::get('register', [RegisterController::class, 'register'])->name('register.index');
    Route::post('register/store', [RegisterController::class, 'registerStore'])->name('register.store');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();
// Route::get('login/user', [AuthController::class, 'login']);
// Route::post('login/store', [AuthController::class, 'store'])->name('login.store');
// Route::get('register-user', [AuthController::class, 'register'])->name('register.index');
// Route::post('register/store', [AuthController::class, 'registerStore'])->name('register.store');