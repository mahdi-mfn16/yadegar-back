<?php

namespace Learnbox\Content\Providers;

use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ContentConfig.php', 'ContentConfig');

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../App/Http/routes/api.php');
    }

    public function register(): void
    {
        $this->app->register(RepositoryServiceProvider::class);
    }
}