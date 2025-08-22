<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::prefix('teachers')
    ->controller(TeacherController::class)
    ->group(function () {
        Route::middleware(['auth:sanctum'])
            ->group(function () {
                Route::post('/', 'store');
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/{id}', 'update');
                Route::delete('/{id}', 'destroy');
            });

    });
