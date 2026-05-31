<?php

use Illuminate\Support\Facades\Route;
use Yadegar\Memory\App\Http\Controllers\MemoryController;
use Yadegar\Memory\App\Http\Controllers\FolderController;

Route::group([
    'prefix' => config('MemoryConfig.prefix'),
    'middleware' => config('MemoryConfig.middleware')
], function() {

    Route::group([
        'middleware' => ['auth:sanctum']
    ], function() {
        Route::get('/folders/myself', [FolderController::class, 'getMyFolders'])->name('folders.myself');
        Route::apiResource('folders', FolderController::class)->only(['store','show','update', 'destroy', 'index'])->names('folders');

        Route::get('/memories/myself', [MemoryController::class, 'getMyMemories'])->name('memories.myself');
        Route::apiResource('memories', MemoryController::class)->only(['store', 'update', 'destroy', 'show'])->names('memories');
        
        
    });


    Route::group([
        'middleware' => []
    ], function() {
        Route::apiResource('memories', MemoryController::class)->only(['index'])->names('memories');
    });

});


