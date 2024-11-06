<?php

use App\Http\Middleware\adminlogin;
use App\Http\Middleware\adminguest;
use App\Http\Middleware\userlogin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin_login'=>adminlogin::class,
            'admin_guest'=>adminguest::class,
            'user_login'=>userlogin::class,
        ]);

     })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
