<?php

use Hoomat\Management\App\Http\Controllers\IndustryController;
use Hoomat\Management\App\Http\Controllers\OrganizationController;
use Hoomat\Management\App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('ManagementConfig.prefix'),
    'middleware' => config('ManagementConfig.middleware')
], function() {


    Route::apiResource('organizations', OrganizationController::class);
    Route::apiResource('industries', IndustryController::class)->only(['index']);
    // Route::apiResource('websites', WebsiteController::class);

});
