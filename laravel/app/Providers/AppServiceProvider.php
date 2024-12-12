<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('path.public', function() {
            return base_path().'../public';
        });

        if (app()->runningInConsole()) {
            Schema::enableForeignKeyConstraints();
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->runningInConsole()) {
            Schema::disableForeignKeyConstraints();
        }
    }
}
