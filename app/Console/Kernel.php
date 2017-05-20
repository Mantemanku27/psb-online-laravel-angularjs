<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Events\Dispatcher;

class Kernel extends ConsoleKernel
{
    /**
     * Perintah Artisan yang disediakan oleh aplikasi Anda.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Tentukan jadwal perintah aplikasi.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Daftarkan perintah berdasarkan Penutupan untuk aplikasi.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }

    public function __construct(Application $app, Dispatcher $events)
    {
        parent::__construct($app, $events);
        array_walk($this->bootstrappers, function (&$bootstrapper) {
            if ($bootstrapper === 'Illuminate\Foundation\Bootstrap\ConfigureLogging') {
            $bootstrapper = 'Bootstrap\ConfigureLogging';
            }
        });
    }

}
