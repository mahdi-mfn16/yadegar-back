<?php

use Yadegar\Identities\App\Http\Controllers\PermissionController;
use Yadegar\Identities\App\Http\Controllers\RoleController;
use Yadegar\Identities\App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Yadegar\Identities\App\Http\Controllers\AuthController;
use Yadegar\Identities\App\Http\Controllers\FamilyController;

Route::group([
    'prefix' => config('IdentitiesConfig.prefix'),
], function() {

    // ---- User Access ----
    Route::group([
        'prefix' => '',
        'middleware' => config('IdentitiesConfig.middleware')
    ], function() {

        Route::put('/families/list', [FamilyController::class, 'getUserFamily'])->name('families.update');
        Route::post('/families/invite', [FamilyController::class, 'inviteToFamily'])->name('families.invite');
        Route::put('/families/join', [FamilyController::class, 'joinToFamily'])->name('families.join');
        Route::put('/families/{family}', [FamilyController::class, 'updateFamilyMember'])->name('families.update');
        Route::delete('/families/remove', [FamilyController::class, 'removeFromFamily'])->name('families.remove');

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

        // Route::get('/google/login', [AuthController::class, 'loginGoogle'])->name('auth.google.login');
        // Route::get('/google/callback', [AuthController::class, 'googleAuthCallback'])->name('auth.google.callback');

        Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
        Route::get('/send-code', [AuthController::class, 'sendCode'])->name('auth.sendCode');
        Route::post('/check-code', [AuthController::class, 'checkUserCode'])->name('auth.checkCode');
        Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('auth.logout');

    });
});
