<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        Gate::define('manage-product', function ($user, $product) {
            return $user->id === $product->user_id;
        });

        Gate::define('view-product', function ($user, $product) {
            return $user->id === $product->user_id || $product->is_public;
        });
    }
}
