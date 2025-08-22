<?php

use App\Http\Controllers\PreferenceTimeController;
use Illuminate\Support\Facades\Route;

Route::prefix('preferences-times')
    ->controller(PreferenceTimeController::class)
    ->group(function () {
        Route::middleware(['auth:sanctum', 'ability:user-teacher'])
            ->group(function () {
                Route::post('/', 'store');
                Route::get('/', 'index');
                Route::get('/{preferenceTime}', 'show');
                Route::put('/{preferenceTime}', 'update');
                Route::delete('/{preferenceTime}', 'destroy');
            });

    });
