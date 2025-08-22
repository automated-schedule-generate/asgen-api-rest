<?php

use App\Http\Controllers\CoordinatorController;
use Illuminate\Support\Facades\Route;

Route::prefix('coordinators')
    ->controller(CoordinatorController::class)
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::middleware(['ability:user-cradt,user-den'])
            ->group(function () {
                Route::get('/{coordinator}', 'show');
                Route::post('/', 'store');
                Route::get('/', 'index');
                Route::put('/{coordinator}', 'update');
                Route::delete('/{coordinator}', 'destroy');
            });
    });
