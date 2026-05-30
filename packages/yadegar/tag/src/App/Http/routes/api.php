<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('TagConfig.prefix'),
    'middleware' => config('TagConfig.middleware')
], function() {

});