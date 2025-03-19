<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        //disable csrf for postman tests
       /* $middleware->validateCsrfTokens(except:[
           'registerUser',
           'loginUser',
           'user/createNewTransaction'
        ]); */
        $middleware->redirectGuestsTo(fn() => route('user.auth.showLoginForm'));
        $middleware->redirectUsersTo(fn()=>route('home'));
        
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
