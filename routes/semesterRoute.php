<?php

use App\Http\Controllers\SemesterController;
use Illuminate\Support\Facades\Route;

Route::prefix('semesters')
    ->controller(SemesterController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{semester}', 'show');
        Route::put('/{semester}', 'update');
        Route::delete('/{semester}', 'destroy');
    });
