<?php

use Illuminate\Support\Facades\Route;
use Yadegar\Memory\App\Http\Controllers\MemoryController;

Route::group([
    'prefix' => config('MemoryConfig.prefix'),
    'middleware' => config('MemoryConfig.middleware')
], function() {

    Route::group([
        'middleware' => ['auth:sanctum']
    ], function() {
        Route::get('/memories/myself', [MemoryController::class, 'myMemoryList'])->name('memories.myself');
        Route::apiResource('memories', MemoryController::class)->only(['store', 'update', 'destroy'])->names('memories');
    });


    Route::group([
        'middleware' => []
    ], function() {
        Route::apiResource('memories', MemoryController::class)->only(['index', 'show'])->names('memories');
    });

});


