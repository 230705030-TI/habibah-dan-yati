<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sembako extends Model
{
    use HasFactory;

    // Nama tabel kita di database nanti
    protected $table = 'sembakos';

    // Kolom-kolom database yang boleh diisi
    protected $fillable = [
        'nama_barang',
        'stok',
        'harga',
    ];
}