<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // CSRF exceptions for SPA domains
        $middleware->validateCsrfTokens(except: [
            'http://127.0.0.1:8000/*',
            'https://cp.caedo.org/*',
        ]);

        // Stateful API (important for Sanctum)
        $middleware->statefulApi([
            'caedo.org',
        ]);

        // Middleware aliases if needed
        $middleware->alias([
            'cors' => \Fruitcake\Cors\HandleCors::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
