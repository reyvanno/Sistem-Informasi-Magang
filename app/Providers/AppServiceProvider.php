<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share config dengan semua views
        view()->share('jurusan', config('internship.jurusan'));
        view()->share('agama', config('internship.agama'));
    }
}