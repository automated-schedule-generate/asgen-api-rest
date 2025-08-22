<?php

use App\Http\Controllers\SchoolClassController;
use Illuminate\Support\Facades\Route;

Route::prefix('classes')
    ->controller(SchoolClassController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{classes}', 'show');
        Route::put('/{classes}', 'update');
        Route::delete('/{classes}', 'destroy');
    });
