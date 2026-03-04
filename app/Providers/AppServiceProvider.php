<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Auth\ProfileEmailUserProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\ShareCapitalTransaction;
use App\Observers\ShareCapitalTransactionObserver;

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
        Auth::provider('profile-email', function ($app, array $config) {
            return new ProfileEmailUserProvider(
                $app['hash'],
                $config['model'],
            );
        });

        // Register observer for Share Capital transactions
        ShareCapitalTransaction::observe(ShareCapitalTransactionObserver::class);
    }
}
