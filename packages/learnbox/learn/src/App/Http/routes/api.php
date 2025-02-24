<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('LearnConfig.prefix'),
    'middleware' => config('LearnConfig.middleware')
], function() {

});