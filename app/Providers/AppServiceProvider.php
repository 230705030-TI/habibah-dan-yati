<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\SembakoServiceInterface;
use App\Services\SembakoService;

class MockAuth implements \App\Contracts\AuthInterface {
    public function login(string $email, string $password): bool { return true; }
    public function logout(): void {}
    public function register(array $data): bool { return true; }
}

class MockCrud implements \App\Contracts\DashboardCrudInterface {
    public function getAllData(): array { 
        $data = session('final_sembako_pure_array_db', [
            ['id' => 1, 'nama_barang' => 'Beras Premium 5kg', 'stok' => 45, 'status' => 'Tersedia'],
            ['id' => 2, 'nama_barang' => 'Minyak Goreng 2L', 'stok' => 3, 'status' => 'Stok Menipis'],
        ]);
        return json_decode(json_encode($data), true);
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
        session(['final_sembako_pure_array_db' => $currentData]);
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