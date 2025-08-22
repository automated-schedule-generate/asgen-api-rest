<?php

use App\Http\Controllers\auth\VerificationMailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthenticationController;
use Illuminate\Http\Request;

Route::prefix('users')
    ->group(function () {

        Route::controller(AuthenticationController::class)
            ->group(function () {

                Route::post('/login', 'login');
                Route::post('/register', 'register');

                Route::middleware('auth:sanctum')
                    ->group(function () {

                        Route::get('', 'me');
                        Route::get('/refresh', 'refresh');
                        Route::post('/logout', 'logout');
                    });
                Route::middleware(['auth:sanctum', 'ability:user-cradt,user-den'])
                    ->group(function () {
                        Route::post('/change-role/{user}', 'changeUserRole');
                    });
            });

        Route::controller(VerificationMailController::class)
            ->middleware('auth:sanctum')
            ->group(function () {

                Route::get('/send-verification-code', 'sendVerificationCode');
                Route::post('/verify-code', 'verifyCode');

            });

        Route::middleware('auth:sanctum')
            ->get('/user_type', function (Request $request) {
                $user = $request->user();
                $authorization = [];

                if ($user->is_cradt) {
                    $authorization[] = 'user-cradt';
                }

                if ($user->is_den) {
                    $authorization[] = 'user-den';
                }

                // Checando se existe a relação (hasOne ou belongsTo)
                if ($user->teachers()->exists()) {
                    $authorization[] = 'user-teacher';
                }

                return response()->json([
                    'authorization' => $authorization,
                ]);
            });

    });
