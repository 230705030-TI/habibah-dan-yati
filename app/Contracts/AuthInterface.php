<?php

namespace App\Contracts;

/**
 * Fitur 1 — Autentikasi Pengguna (Login & Register)
 * Mengatur masuk, daftar, dan enkripsi keamanan pengguna.
 */
interface AuthInterface
{
    /**
     * Mendaftarkan pengguna/mahasiswa baru ke sistem.
     * @param array $data Data pendaftaran (name, email, password, dll)
     * @return bool True jika berhasil, False jika gagal
     */
    public function register(array $data): bool;

    /**
     * Memproses login pengguna ke dalam sistem.
     * @param string $email
     * @param string $password
     * @return bool True jika kredensial benar
     */
    public function login(string $email, string $password): bool;

    /**
     * Mengeluarkan pengguna dari sesi aktif (Logout).
     * @return void
     */
    public function logout(): void;
}