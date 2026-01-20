<?php

use App\Exceptions\CarSoldException;
use App\Exceptions\NotFoundSaleException;
use App\Exceptions\StatusIsNotCreatedExceiption;
use App\Helpers\ApiResponse;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Mockery\Matcher\Not;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (CarSoldException $exception){
            return ApiResponse::error('',$exception->getMessage(), $exception->getCode());
        });
        $exceptions->render(function (NotFoundSaleException $exception){
            return ApiResponse::error('',$exception->getMessage(), $exception->getCode());
        });
        $exceptions->render(function (StatusIsNotCreatedExceiption $exception){
            return ApiResponse::error('',$exception->getMessage(), $exception->getCode());
        });
        
    })->create();
