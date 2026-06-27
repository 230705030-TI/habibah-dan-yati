<?php

namespace App\Services;

use App\Contracts\SembakoServiceInterface;
use App\Models\Sembako;
use Illuminate\Support\Collection;

class SembakoService implements SembakoServiceInterface
{
    public function ambilSemuaBarang(): Collection
    {
        return Sembako::orderBy('nama_barang', 'asc')->get();
    }

    public function tambahBarangBaru(array $data): Sembako
    {
        return Sembako::create($data);
    }
}