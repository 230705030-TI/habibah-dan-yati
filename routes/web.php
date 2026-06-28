<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// 1. RUTE UTAMA: Diarahkan ke halaman Login
Route::get('/', function () {
    return view('login'); 
})->name('login');

Route::get('/login', function () { 
    return view('login'); 
});

Route::get('/register', function () { 
    return view('register'); 
});

// 2. FITUR DASHBOARD UTAMA (Menggunakan DashboardController yang Benar)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// 3. PROSES BACKEND (Login, Logout, Simpan, & Hapus Data)
Route::post('/login/process', [DashboardController::class, 'processLogin']);
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
Route::post('/dashboard/store', [DashboardController::class, 'store']);
Route::post('/dashboard/destroy/{id}', [DashboardController::class, 'destroy']);