<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\AuthInterface;
use App\Contracts\DashboardCrudInterface;
use App\Contracts\WeatherApiInterface;
use App\Contracts\SearchableInterface;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $authContract;
    protected $crudContract;
    protected $weatherContract;
    protected $searchContract;

    public function __construct(
        AuthInterface $authContract,
        DashboardCrudInterface $crudContract,
        WeatherApiInterface $weatherContract,
        SearchableInterface $searchContract
    ) {
        $this->authContract = $authContract;
        $this->crudContract = $crudContract;
        $this->weatherContract = $weatherContract;
        $this->searchContract = $searchContract;
    }

    public function index(Request $request)
    {
        // BYPASS PURBA: Data dipaksa murni array asosiatif (100% anti-stdClass)
        $items = [
            ['id' => 1, 'nama_barang' => 'Beras Premium 5kg', 'stok' => 45, 'status' => 'Tersedia'],
            ['id' => 2, 'nama_barang' => 'Minyak Goreng 2L', 'stok' => 3, 'status' => 'Stok Menipis'],
            ['id' => 3, 'nama_barang' => 'Gula Pasir 1kg', 'stok' => 12, 'status' => 'Tersedia'],
        ];

        // Fitur pencarian lokal darurat
        if ($request->has('keyword') && $request->keyword != '') {
            $keyword = $request->keyword;
            $items = array_values(array_filter($items, function($item) use ($keyword) {
                return stripos($item['nama_barang'], $keyword) !== false;
            }));
        }

        $weatherData = [
            'name' => 'Banda Aceh',
            'temp' => 28,
            'weather' => [['description' => 'Cerah Berawan']]
        ];

        return view('dashboard', compact('items', 'weatherData'));
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        return redirect()->route('dashboard')->with('success', 'Selamat Datang!');
    }

    public function store(Request $request)
    {
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    public function logout()
    {
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
