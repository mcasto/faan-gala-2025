<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // // Add unique context to all log entries
        // Log::withContext([
        //     'request_id' => \Illuminate\Support\Str::uuid(),
        //     'source' => 'app' // You can add other context here too
        // ]);
    }
}
