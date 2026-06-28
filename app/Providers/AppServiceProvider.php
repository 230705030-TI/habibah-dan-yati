<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\SembakoServiceInterface;
use App\Services\SembakoService;

// =========================================================================
// MOCK CLASS DENGAN DATA STATIC MEMORI (BYPASS SESSION & COOKIE CACHE)
// =========================================================================

class MockAuth implements \App\Contracts\AuthInterface {
    public function login(string $email, string $password): bool { return true; }
    public function logout(): void {}
    public function register(array $data): bool { return true; }
}

class MockCrud implements \App\Contracts\DashboardCrudInterface {
    // Trik Sakti: Gunakan static property agar data disimpan di memory ram PHP, bukan di file session yang rusak!
    private static $staticDatabase = [
        ['id' => 1, 'nama_barang' => 'Beras Premium 5kg', 'stok' => 45, 'status' => 'Tersedia'],
        ['id' => 2, 'nama_barang' => 'Minyak Goreng 2L', 'stok' => 3, 'status' => 'Stok Menipis'],
        ['id' => 3, 'nama_barang' => 'Gula Pasir 1kg', 'stok' => 12, 'status' => 'Tersedia'],
    ];

    public function getAllData(): array { 
        // Dipaksa murni mengembalikan array asosiatif murni dari memory RAM
        return self::$staticDatabase;
    }

    public function createData(array $data): bool { 
        $newId = count(self::$staticDatabase) > 0 ? max(array_column(self::$staticDatabase, 'id')) + 1 : 1;
        
        self::$staticDatabase[] = [
            'id' => $newId,
            'nama_barang' => $data['nama_barang'] ?? ($data['nama'] ?? 'Barang Baru'),
            'stok' => (int)($data['stok'] ?? 0),
            'status' => ($data['stok'] ?? 0) <= 5 ? 'Stok Menipis' : 'Tersedia'
        ];
        
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
// REGISTER SERVICE PROVIDER
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