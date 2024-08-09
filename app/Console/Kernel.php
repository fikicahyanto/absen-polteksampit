<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\everyMinute::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('minute:update')
        // ->everyMinute();
        $schedule->command('minute:belajar-membuat-cron')->everyMinute();
        // $schedule->command('inspire')
        //          ->hourly();

        // $schedule->call(function () {
        //     info('called minute');
        // })->everyMinute();
        // $schedule->command('backup:run')->dailyAt('18:00');
        // $schedule->command('emails:send')->daily();
        // $schedule->call(function () {
        //     // kode untuk mengirim SMS di sini
        //     echo 'Cron kita sudah jalan!';
        //     Log::info("SMS telah dikirim!");
        // })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
