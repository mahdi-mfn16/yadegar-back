<?php

namespace Yadegar\Tag\Providers;

use Illuminate\Support\ServiceProvider;

class TagServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/TagConfig.php', 'TagConfig');

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../App/Http/routes/api.php');
    }

    public function register(): void
    {
        $this->app->register(RepositoryServiceProvider::class);
    }
}