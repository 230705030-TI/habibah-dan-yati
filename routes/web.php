<?php

use Illuminate\Support\Facades\Route;

// 1. RUTE UTAMA: Langsung kita arahkan ke halaman Login SembakoTrack
Route::get('/', function () {
    return view('login'); // Pastikan kamu punya file 'login.blade.php' di folder views
});

// 2. FITUR 1 & 4: Halaman Login, Register, dan Pencarian Real-time
Route::get('/login', function () { return view('login'); });
Route::get('/register', function () { return view('register'); });

// 3. FITUR 2 & 3: Halaman Dashboard Utama (CRUD & Integrasi Cuaca OpenWeatherMap)
Route::get('/dashboard', function () {
    return view('dashboard'); // Pastikan kamu punya file 'dashboard.blade.php' di folder views
});

// Tambahkan rute lain di bawah ini sesuai nama file .blade.php fitur SembakoTrack kalian...