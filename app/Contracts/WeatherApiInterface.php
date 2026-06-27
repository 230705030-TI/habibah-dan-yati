<?php

namespace App\Contracts;

/**
 * Fitur 3 — Integrasi Layanan Pihak Ketiga (Third-Party API)
 * Menangani pengambilan data prakiraan cuaca lokal dari OpenWeatherMap API.
 */
interface WeatherApiInterface
{
    /**
     * Mengambil data cuaca real-time berdasarkan nama kota tertentu.
     * @param string $cityName Contoh: "Banda Aceh"
     * @return array Data cuaca yang sudah diproses oleh backend
     */
    public function getWeatherByCity(string $cityName): array;
}