<?php

namespace Hoomat\Management\Providers;

use Illuminate\Support\ServiceProvider;

class ManagementServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ManagementConfig.php', 'ManagementConfig');

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../App/Http/routes/api.php');
    }

    public function register(): void
    {
        $this->app->register(RepositoryServiceProvider::class);
    }
}
