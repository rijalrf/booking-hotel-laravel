<?php

namespace App\Providers;

use App\Models\Employee;
use App\Observers\EmployeeObserver;
use Illuminate\Pagination\Paginator;
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
        // add bootstrap pagination
        Paginator::useBootstrapFive();

        //observe
        Employee::observe(EmployeeObserver::class);

        //gate room create
        Gate::define('create-room', function ($user) {
            return $user->hasRole()->hasManager;
        });
        Gate::define('hasManager', function ($user) {
            return $user->hasRole()->hasManager;
        });
    }
}
