<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
// PER PAGINAZIONE NELLA INDEX DI ANNUNCI
use Illuminate\Pagination\Paginator;

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
        if (Schema::hasTable('categories'))
        {
            View::share('categories', Category::all());
        }

        // PER PAGINAZIONE NELLA INDEX DI ANNUNCI
        Paginator::useBootstrapFive();
    }
}
