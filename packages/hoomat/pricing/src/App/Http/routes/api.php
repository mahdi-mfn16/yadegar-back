<?php

use Hoomat\Pricing\App\Models\Plan;
use Hoomat\Pricing\App\Models\PlanOption;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('PricingConfig.prefix'),
    'middleware' => config('PricingConfig.middleware')
], function() {

    Route::apiResource('plan-options', PlanOption::class)->names('plan_options');
    Route::apiResource('plans', Plan::class)->names('plans');
});