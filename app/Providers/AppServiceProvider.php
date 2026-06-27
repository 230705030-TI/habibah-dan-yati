<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\SembakoServiceInterface;
use App\Services\SembakoService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Di sinilah KUNCI atau IKATAN (Binding) itu dibuat!
        $this->app->bind(SembakoServiceInterface::class, SembakoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}