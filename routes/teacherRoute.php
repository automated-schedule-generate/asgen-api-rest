<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::prefix('teachers')
    ->controller(TeacherController::class)
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/me', 'me');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
        Route::middleware(['ability:user-cradt,user-den'])
        ->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
        });
    });
