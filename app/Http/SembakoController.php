<?php

namespace App\Http\Controllers;

use App\Contracts\SembakoServiceInterface;
use Illuminate\Http\Request;

class SembakoController extends Controller
{
    protected $sembakoService;

    // Laravel otomatis menyuntikkan SembakoService ke sini karena sudah kita BIND di AppServiceProvider
    public function __construct(SembakoServiceInterface $sembakoService)
    {
        $this->sembakoService = $sembakoService;
    }

    public function index()
    {
        // Memanggil fungsi dari service untuk mengambil data
        $daftarBarang = $this->sembakoService->ambilSemuaBarang();

        // Mengembalikan data dalam bentuk JSON untuk tes apakah berhasil atau tidak
        return response()->json($daftarBarang);
    }
}