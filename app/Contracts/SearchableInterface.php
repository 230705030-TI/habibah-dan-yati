<?php

namespace App\Contracts;

/**
 * Fitur 4 — Pencarian dan Filter Real-time
 * Menyediakan fungsi pencarian instan (no-reload) pada tabel data.
 */
interface SearchableInterface
{
    /**
     * Mencari data berdasarkan kata kunci (keyword) secara spesifik.
     * @param string $keyword Kata kunci yang diinput pengguna
     * @param array $filters Filter tambahan (optional)
     * @return array Hasil pencarian yang cocok
     */
    public function search(string $keyword, array $filters = []): array;
}
