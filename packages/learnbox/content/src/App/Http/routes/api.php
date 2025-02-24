<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('ContentConfig.prefix'),
    'middleware' => config('ContentConfig.middleware')
], function() {

});