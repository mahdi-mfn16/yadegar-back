<?php

namespace Learnbox\Learn\Providers;

use Illuminate\Support\ServiceProvider;

class LearnServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/LearnConfig.php', 'LearnConfig');

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../App/Http/routes/api.php');
    }

    public function register(): void
    {
        $this->app->register(RepositoryServiceProvider::class);
    }
}