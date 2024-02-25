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
    
    Route::apiResource('invited-users', WebsiteController::class)->only(['index', 'store', 'destroy']);
    Route::get('send-invite/{invitedUser}', [WebsiteController::class, 'sendInvite']);
    
    Route::apiResource('websites', WebsiteController::class)->except(['update']);
    Route::put('update-plan/{website}', [WebsiteController::class, 'updatePlan']);
    Route::put('transfer/{website}', [WebsiteController::class, 'transferWebsite']);
    Route::put('verify-install/{website}', [WebsiteController::class, 'verifyInstall']);

});
