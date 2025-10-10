<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/{user}', 'show');
        Route::post('/', 'register');
        Route::put('/{user}', 'update');
        Route::delete('/{user}', 'destroy');
        Route::middleware(['auth:sanctum', 'ability:user-teacher'])
        ->group(function () {
                Route::put('/user_status/{user}', 'update_user_status');
        });
    });
