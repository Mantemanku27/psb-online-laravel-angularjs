<?php namespace Bootstrap;

use Monolog\Logger as Monolog;
use Illuminate\Log\Writer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Bootstrap\ConfigureLogging as BaseConfigureLogging;
use Monolog\Handler\StreamHandler;

class ConfigureLogging extends BaseConfigureLogging
{

    /**
     * OVERRIDE PARENT
     * Configure the Monolog handlers for the application.
     *
     * @param  \Illuminate\Contracts\Foundation\Application $app
     * @param  \Illuminate\Log\Writer                       $log
     *
     * @return void
     */
    protected function configureHandlers(Application $app, Writer $log)
    {

        $bubble = false;

        // Stream Handlers
        $infoStreamHandler = new StreamHandler(storage_path("/logs/laravel_info.log"), Monolog::INFO, $bubble);
        $warningStreamHandler = new StreamHandler(storage_path("/logs/laravel_warning.log"), Monolog::WARNING, $bubble);
        $errorStreamHandler = new StreamHandler(storage_path("/logs/laravel_error.log"), Monolog::ERROR, $bubble);

        // Get monolog instance and push handlers
        $monolog = $log->getMonolog();
        $monolog->pushHandler($infoStreamHandler);
        $monolog->pushHandler($warningStreamHandler);
        $monolog->pushHandler($errorStreamHandler);

        $log->useDailyFiles($app->storagePath() . '/logs/daily.log');
    }
}