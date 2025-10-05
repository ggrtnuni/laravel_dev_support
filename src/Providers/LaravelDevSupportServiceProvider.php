<?php

namespace LaravelDevSupport\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelDevSupport\Console\Commands\TestCommand;

class LaravelDevSupportServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // routes
        // $this->loadRoutesFrom(__DIR__, '/../routes/console.php');
        // views
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-dev-support');

        // commands
        $this->app->singleton(TestCommand::class);

        $this->commands([
            TestCommand::class,
        ]);
    }

    public function register()
    {
        // commands
        // Artisan::registerCommand(resolve(\LaravelDevSupport\Console\Commands\TestCommand::class));
        // ↑を書くと下記エラーになる。
        // > Illuminate\Foundation\ComposerScripts::postAutoloadDump
        // > @php artisan package:discover --ansi
        //    ERROR  There are no commands defined in the "package" namespace.  
        // Script @php artisan package:discover --ansi handling the post-autoload-dump event returned with error code 1

        // services
    }
}
