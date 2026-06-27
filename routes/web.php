<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SembakoController;

// Halaman utama bawaan Laravel
Route::get('/', function () {
    return view('welcome');
});

// Route baru untuk memanggil SembakoController yang menggunakan Service & Contract tadi
Route::get('/sembako-cek', [SembakoController::class, 'index']);