<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

use App\Console\Commands\GenerateMonthlyBills;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('bills:generate', function () {
    (new App\Console\Commands\GenerateMonthlyBills())->handle();
})->describe('Generate monthly bills for active students');

app()->singleton(Schedule::class, function ($app) {
    $schedule = new Schedule();
    $schedule->command('bills:generate')->monthly();
    return $schedule;
});