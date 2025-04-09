<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;

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
        // Share the user's profile photo globally
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $view->with('profile_photo', $user); // Pass the full user object
            }
        });

        $this->app->singleton(Schedule::class, function ($app) {
            $schedule = new Schedule();
            $schedule->command('bills:generate')->monthly(); // Runs every month
            return $schedule;
        });
    }
}
