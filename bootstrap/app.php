<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\Admin; // Assurez-vous d'importer correctement le middleware
use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Enregistrement du middleware 'admin'
        $middleware->alias([
            'admin' => Admin::class,  // Alias du middleware Admin
            'checkRole' => CheckRole::class,  // Alias du middleware role
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
