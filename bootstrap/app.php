<?php

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    LaravelDevSupport\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    LaravelDevSupport\Exceptions\Handler::class
);

$app->useAppPath('src');

return $app;
