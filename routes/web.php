<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SembakoController;

// 1. RUTE UTAMA: Langsung diarahkan ke halaman Login SembakoTrack
Route::get('/', function () {
    return view('login'); 
});

// Route memanggil SembakoController yang menggunakan Service & Contract
Route::get('/sembako-cek', [SembakoController::class, 'index']);

// 2. FITUR 1 & 4: Halaman Login, Register, dan Pencarian Real-time
Route::get('/login', function () { return view('login'); });
Route::get('/register', function () { return view('register'); });

// 3. FITUR 2 & 3: Halaman Dashboard Utama (CRUD & Integrasi Cuaca)
Route::get('/dashboard', function () { return view('dashboard'); });