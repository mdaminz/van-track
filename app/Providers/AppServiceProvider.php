<?php

namespace App\Providers;

use App\Models\Bill;
use App\Models\Feedback;
use App\Models\Report;
use App\Models\Forum;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Carbon\Carbon;

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

        View::composer('admin.admin-base', function ($view) {
            $oneWeekAgo = Carbon::now()->subWeek();

            // Helper closure to get up to 3 recent + older fallback
            $getRecentWithFallback = function ($query) use ($oneWeekAgo) {
                $recent = (clone $query)
                    ->where('created_at', '>=', $oneWeekAgo)
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();

                if ($recent->count() < 3) {
                    $needed = 3 - $recent->count();
                    $fallback = (clone $query)
                        ->where('created_at', '<', $oneWeekAgo)
                        ->orderBy('created_at', 'desc')
                        ->take($needed)
                        ->get();

                    return $recent->merge($fallback);
                }

                return $recent;
            };

            $user_data = $getRecentWithFallback(User::where('usertype', 'user'));
            $pending_data = $getRecentWithFallback(Bill::where('status', 'Pending'));
            $report_data = $getRecentWithFallback(Report::where('status', 'Unresolved'));
            $feedback_data = $getRecentWithFallback(Feedback::query());
            $forum_data = $getRecentWithFallback(Forum::query());

            $view->with('user_data', $user_data)
                ->with('pending_data', $pending_data)
                ->with('report_data', $report_data)
                ->with('feedback_data', $feedback_data)
                ->with('forum_data', $forum_data);
        });

        View::composer('user.user-base', function ($view) {
            $user = Auth::user();

            if ($user) {
                $oneWeekAgo = Carbon::now()->subWeek();

                // Helper closure for fetching up to 3 recent items, then fallback to older
                $getRecentWithFallback = function ($query) use ($oneWeekAgo) {
                    $recent = (clone $query)
                        ->where('created_at', '>=', $oneWeekAgo)
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get();

                    if ($recent->count() < 3) {
                        $needed = 3 - $recent->count();
                        $fallback = (clone $query)
                            ->where('created_at', '<', $oneWeekAgo)
                            ->orderBy('created_at', 'desc')
                            ->take($needed)
                            ->get();

                        return $recent->merge($fallback);
                    }

                    return $recent;
                };

                $unpaid_bills = $getRecentWithFallback(Bill::where('user_id', $user->id)->where('status', 'Pending'));
                $paid_bills = $getRecentWithFallback(Bill::where('user_id', $user->id)->where('status', 'Paid'));
                $report_data = $getRecentWithFallback(Report::where('user_id', $user->id)->where('status', 'Resolved'));
                $forum_data = $getRecentWithFallback(Forum::query()); // Public forum posts

                $view->with('unpaid_bills', $unpaid_bills)
                    ->with('paid_bills', $paid_bills)
                    ->with('report_data', $report_data)
                    ->with('forum_data', $forum_data);
            }
        });

        View::composer('driver.driver-base', function ($view) {
            $user = Auth::user();

            if ($user) {
                $oneWeekAgo = Carbon::now()->subWeek();

                // Helper to fetch recent items with fallback to older ones
                $getRecentWithFallback = function ($query) use ($oneWeekAgo) {
                    $recent = (clone $query)
                        ->where('created_at', '>=', $oneWeekAgo)
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get();

                    if ($recent->count() < 3) {
                        $needed = 3 - $recent->count();
                        $fallback = (clone $query)
                            ->where('created_at', '<', $oneWeekAgo)
                            ->orderBy('created_at', 'desc')
                            ->take($needed)
                            ->get();

                        return $recent->merge($fallback);
                    }

                    return $recent;
                };

                $report_data = $getRecentWithFallback(
                    Report::where('user_id', $user->id)->where('status', 'Resolved')
                );

                $forum_data = $getRecentWithFallback(Forum::query());

                $view->with('report_data', $report_data)
                    ->with('forum_data', $forum_data);
            }
        });

    }
}
