<?php

return [
    // base prefix
    'prefix' => 'api/files',

    // base middleware
    'middleware' => ['api', 'auth:sanctum'],

    'default_disk' => env('DEFAULT_DISK', 'cdn-public'),

    'public_disk' => 'cdn-public',

    'private_disk' => env('PRIVATE_DISK', 'cdn-private'),

];
