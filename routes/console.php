<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


// Schedule a command => artisan:podcasts:fetch-episodes
Schedule::command('podcasts:fetch-episodes')->hourly();



// To update your crontab:

// Open the crontab editor:
// bash
// Copy code
// crontab -e
// Replace the existing entry with the new one:
// bash
// Copy code
// 0 * * * * cd /Users/taswermediaproduction02/Desktop/Brander/laravel/doz && php artisan schedule:run >> /dev/null 2>&1
// Save and exit the editor.
