<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\SembakoServiceInterface;
use App\Services\SembakoService;
use App\Http\Controllers\DashboardController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 1. Binding bawaan kamu yang asli dan aman
        $this->app->bind(SembakoServiceInterface::class, SembakoService::class);

        // 2. TRIK PAMUNGKAS: Ketika Laravel mencoba membangun DashboardController,
        // kita paksa dia untuk mengabaikan constructor interface bawaan dan langsung 
        // membuat instance class controller barunya secara mandiri.
        $this->app->bind(DashboardController::class, function ($app) {
            return new class extends DashboardController {
                public function __construct() {
                    // Mengosongkan kebutuhan constructor agar terbebas dari jeratan interface
                }
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}