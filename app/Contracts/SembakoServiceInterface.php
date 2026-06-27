<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use App\Models\Sembako;

interface SembakoServiceInterface
{
    public function ambilSemuaBarang(): Collection;
    public function tambahBarangBaru(array $data): Sembako;
}