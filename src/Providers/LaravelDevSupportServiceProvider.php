<?php

namespace LaravelDevSupport\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class LaravelDevSupportServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // routes
        // $this->loadRoutesFrom(__DIR__, '/../routes/console.php');
        // views
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-dev-support');
    }

    public function register()
    {
        // commands
        Artisan::registerCommand(resolve(\LaravelDevSupport\Console\Commands\TestCommand::class));
        // services
    }
}
