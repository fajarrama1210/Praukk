<?php

namespace App\Providers;

use App\Models\BookCategories;
use App\Http\Middleware\RoleMiddleware;  // Pastikan middleware sudah dibuat dan diimport
use App\Models\BookCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        view()->share('categories', BookCategory::all());
        // Mendaftarkan middleware role untuk aplikasi
        Route::middleware('role', RoleMiddleware::class);  // Mendaftarkan middleware yang telah dibuat
    }
}
