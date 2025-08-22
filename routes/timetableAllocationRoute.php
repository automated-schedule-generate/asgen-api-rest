<?php

use App\Http\Controllers\TimetableAllocationController;
use Illuminate\Support\Facades\Route;

Route::prefix('/timetable-allocation')
    ->controller(TimetableAllocationController::class)
    ->group(function () {

        Route::get('/', 'index')->name('timetable-allocation.index');

    });
