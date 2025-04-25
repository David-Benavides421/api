<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckRole; // <-- Importa tu middleware

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Aquí registramos los alias
        $middleware->alias([
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
            // ... otros alias que Breeze pueda haber añadido (auth, guest)
            'role' => CheckRole::class, // <-- Nuestro alias para el middleware de rol
        ]);

        // Puedes añadir otros middlewares globales o de grupo aquí si es necesario
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
