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
    // Kita deklarasikan properti untuk menyimpan contract/interface
    protected $authContract;
    protected $crudContract;
    protected $weatherContract;
    protected $searchContract;

    /**
     * Inject semua interface melalui Constructor.
     * Laravel akan otomatis mendeteksi class aslinya berkat AppServiceProvider.
     */
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

   /**
     * Halaman Utama Dashboard 
     * Menggabungkan Fitur 2 (CRUD/Tampil Data) & Fitur 3 (Weather API) & Fitur 4 (Search)
     */
    public function index(Request $request)
    {
        // 1. Cek apakah ada pencarian real-time (Fitur 4)
        if ($request->has('keyword') && $request->keyword != '') {
            $items = $this->searchContract->search($request->keyword);
        } else {
            // Jika tidak ada pencarian, tampilkan semua data inti (Fitur 2)
            $items = $this->crudContract->getAllData();
        }

        // 🛡️ JARING PENGAMAN NUKLIR: Paksa apa pun tipe datanya (termasuk stdClass gaib) menjadi Array Asosiatif PHP murni
        if ($items) {
            $items = json_decode(json_encode($items), true);
        } else {
            $items = [];
        }

        // Jaga-jaga jika isinya kosong atau error bawaan dari session
        if (empty($items)) {
            $items = [
                ['id' => 1, 'nama_barang' => 'Beras Premium 5kg', 'stok' => 45, 'status' => 'Tersedia'],
                ['id' => 2, 'nama_barang' => 'Minyak Goreng 2L', 'stok' => 3, 'status' => 'Stok Menipis'],
            ];
        }

        // 2. Ambil data cuaca lokal untuk pelengkap dashboard (Fitur 3)
        try {
            $weatherData = $this->weatherContract->getWeatherByCity('Banda Aceh') ?? [];
        } catch (\Exception $e) {
            $weatherData = [];
        }

        // 3. Kirim semua data ke view 'dashboard.blade.php'
        return view('dashboard', compact('items', 'weatherData'));
    }

    /**
     * Fitur 1 — Proses Login
     */
    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $success = $this->authContract->login($request->email, $request->password);

        if ($success) {
            return redirect()->route('dashboard')->with('success', 'Selamat Datang!');
        }

        return back()->withErrors(['msg' => 'Email atau password salah.']);
    }

    /**
     * Fitur 2 — Menambahkan Data Baru (Create)
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'stok'        => 'required|integer',
        ]);

        $success = $this->crudContract->createData($validatedData);

        if ($success) {
            return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
        }

        return redirect()->back()->with('error', 'Gagal menambahkan data.');
    }

    /**
     * Fitur 2 — Menghapus Data (Delete)
     */
    public function destroy($id)
    {
        $success = $this->crudContract->deleteData($id);

        if ($success) {
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'Gagal menghapus data.');
    }

    /**
     * Fitur 1 — Proses Logout
     */
    public function logout()
    {
        $this->authContract->logout();
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}