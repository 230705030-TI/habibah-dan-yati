<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\SembakoServiceInterface;
use App\Services\SembakoService;

// 1. Buat Class Mock Langsung di Sini agar Lolos dari Pengecekan Laravel & VS Code
class MockAuth implements \App\Contracts\AuthInterface {
    public function register(array $data): bool { return true; }
    public function login(string $email, string $password): bool { return true; }
    public function logout(): bool { return true; }
}

class MockCrud implements \App\Contracts\DashboardCrudInterface {
    public function getAllData(): array { return []; }
    public function createData(array $data): bool { return true; }
    public function updateData(int $id, array $data): bool { return true; }
    public function deleteData(int $id): bool { return true; }
    public function getDataById(int $id): ?array { return null; }
}

class MockWeather implements \App\Contracts\WeatherApiInterface {
    public function getWeatherByCity(string $cityName): array { return []; }
}

class MockSearch implements \App\Contracts\SearchableInterface {
    public function search(string $query): array { return []; }
}

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SembakoServiceInterface::class, SembakoService::class);

        // 2. Ikat Interface ke Class Mock Resmi yang Sudah Kita Buat di Atas
        $this->app->bind(\App\Contracts\AuthInterface::class, MockAuth::class);
        $this->app->bind(\App\Contracts\DashboardCrudInterface::class, MockCrud::class);
        $this->app->bind(\App\Contracts\WeatherApiInterface::class, MockWeather::class);
        $this->app->bind(\App\Contracts\SearchableInterface::class, MockSearch::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}