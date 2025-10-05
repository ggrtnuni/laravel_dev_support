<?php

namespace LaravelDevSupport\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelDevSupport\Console\Commands\TestCommand;

class LaravelDevSupportServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // routes
        // $this->loadRoutesFrom(__DIR__, '/../../routes/console.php');
        // views
        // $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laravel-dev-support');

        // commands
        $this->app->singleton(TestCommand::class);

        $this->commands([
            TestCommand::class,
        ]);
    }

    public function register() {}
}
