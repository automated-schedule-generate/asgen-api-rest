<?php

use App\Http\Controllers\TimetableGeneratorController;
use Illuminate\Support\Facades\Route;

Route::prefix('/timetable-generator')
    ->controller(TimetableGeneratorController::class)
    ->group(function () {

        Route::post('/', 'store')->name('timetable-generator.store');
        Route::get('/start', 'start')->name('timetable-generator.start');
    });
