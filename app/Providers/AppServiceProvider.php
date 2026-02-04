<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 🔒 Paksa HTTPS di production (Railway pakai reverse proxy)
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Share config dengan semua views
        view()->share('jurusan', config('internship.jurusan'));
        view()->share('agama', config('internship.agama'));
    }
}
