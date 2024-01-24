<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('super-admin', function (User $user) {
            return $user->hasRole('Super Admin');
        });
        Gate::define('admin', function (User $user) {
            return $user->hasRole('Admin');
        });
        Gate::define('vendor', function (User $user) {
            return $user->hasRole('Vendor');
        });
        Gate::define('delivery', function (User $user) {
            return $user->hasRole('Delivery');
        });
        Paginator::useBootstrap();
    }
}
