<?php

use App\Http\Controllers\PreferenceController;
use Illuminate\Support\Facades\Route;

Route::prefix('preferences')
    ->controller(PreferenceController::class)
    ->group(function () {
        Route::middleware(['auth:sanctum', 'ability:user-cradt,user-den,user-coordinator'])
            ->group(function () {
                Route::get('/show-all-preferences', 'index');
                Route::get('/teacher-preference/{id}', 'showTeacherPreferences');
            });
        Route::middleware(['auth:sanctum', 'ability:user-teacher'])
            ->group(function () {
                Route::post('/', 'store');
                Route::put('/', 'update');
                Route::delete('/', 'destroy');
                Route::get('/', 'show');
            });

    });
