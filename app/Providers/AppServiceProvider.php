<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\SembakoServiceInterface;
use App\Services\SembakoService;

// =========================================================================
// MOCK CLASS DENGAN PAKSAAN RE-CAST ARRAY MURNI SEBELUM DI-RETURN
// =========================================================================

class MockAuth implements \App\Contracts\AuthInterface {
    public function login(string $email, string $password): bool { return true; }
    public function logout(): void {}
    public function register(array $data): bool { return true; }
}

class MockCrud implements \App\Contracts\DashboardCrudInterface {
    public function getAllData(): array { 
        // 1. Ambil data mentah default (Pasti Array)
        $defaultData = [
            ['id' => 1, 'nama_barang' => 'Beras Premium 5kg', 'stok' => 45, 'status' => 'Tersedia'],
            ['id' => 2, 'nama_barang' => 'Minyak Goreng 2L', 'stok' => 3, 'status' => 'Stok Menipis'],
        ];

        // 2. Gunakan KEY BARU SEGERA yang belum pernah dipakai agar tidak tabrakan dengan session lama
        $sessionData = session('database_sembako_super_pure_array_v3', $defaultData);

        // 3. JARING PENGAMAN NUKLIR: Ubah paksa apa pun isinya menjadi Array Asosiatif murni!
        if (!is_array($sessionData)) {
            $sessionData = $defaultData;
        }

        return json_decode(json_encode($sessionData), true);
    }

    public function createData(array $data): bool { 
        $currentData = $this->getAllData();
        $newId = count($currentData) > 0 ? max(array_column($currentData, 'id')) + 1 : 1;
        
        $newItems = [
            'id' => $newId,
            'nama_barang' => $data['nama_barang'] ?? ($data['nama'] ?? 'Barang Baru'),
            'stok' => (int)($data['stok'] ?? 0),
            'status' => ($data['stok'] ?? 0) <= 5 ? 'Stok Menipis' : 'Tersedia'
        ];

        $currentData[] = $newItems;
        // Simpan ke key baru yang steril
        session(['database_sembako_super_pure_array_v3' => $currentData]);
        return true; 
    }

    public function updateData(int $id, array $data): bool { return true; }
    public function deleteData(int $id): bool { return true; }
    public function getDataById(int $id): ?array { return null; }
}

class MockWeather implements \App\Contracts\WeatherApiInterface {
    public function getWeatherByCity(string $cityName): array { return []; }
}

class MockSearch implements \App\Contracts\SearchableInterface {
    public function search(string $keyword, array $filters = []): array { 
        $crud = new MockCrud();
        $data = $crud->getAllData();
        if (empty($keyword)) { return $data; }
        return array_values(array_filter($data, function($item) use ($keyword) {
            return stripos($item['nama_barang'], $keyword) !== false;
        }));
    }
}

// =========================================================================
// REGISTER KE CONTAINER
// =========================================================================

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SembakoServiceInterface::class, SembakoService::class);
        $this->app->bind(\App\Contracts\AuthInterface::class, MockAuth::class);
        $this->app->bind(\App\Contracts\DashboardCrudInterface::class, MockCrud::class);
        $this->app->bind(\App\Contracts\WeatherApiInterface::class, MockWeather::class);
        $this->app->bind(\App\Contracts\SearchableInterface::class, MockSearch::class);
    }

    public function boot(): void {}
}