<?php

use Learnbox\Identities\App\Http\Controllers\PermissionController;
use Learnbox\Identities\App\Http\Controllers\RoleController;
use Learnbox\Identities\App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Learnbox\Identities\App\Http\Controllers\AuthController;



Route::group([
    'prefix' => config('IdentitiesConfig.prefix'),
], function() {

    // ---- User Access ----
    Route::group([
        'prefix' => '',
        'middleware' => config('IdentitiesConfig.middleware')
    ], function() {
        Route::apiResource('users', UserController::class)->only(['index', 'update'])->names('users');
        Route::get('/users/profile', [UserController::class, 'getMyInfo'])->name('users.profile');
        Route::apiResource('users', UserController::class)->only(['show'])->withoutMiddleware('auth:sanctum');
    
        Route::apiResource('roles', RoleController::class)->except(['show', 'destroy']);
    
        Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');    
  
    });

    // ---- Auth ----
    Route::group([
        'prefix' => 'auth',
        'middleware' => ['api']
    ], function() {

        Route::get('/google/login', [AuthController::class, 'loginGoogle'])->name('auth.google.login');
        Route::get('/google/callback', [AuthController::class, 'googleAuthCallback'])->name('auth.google.callback');

        Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
        Route::get('/send-code', [AuthController::class, 'sendCode'])->name('auth.sendCode');
        Route::post('/check-code', [AuthController::class, 'checkUserCode'])->name('auth.checkCode');
        Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('auth.logout');

    });
});
