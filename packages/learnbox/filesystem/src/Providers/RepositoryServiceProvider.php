<?php

namespace Learnbox\Filesystem\Providers;

use Learnbox\Filesystem\App\Repositories\FileRepository;
use Learnbox\Filesystem\App\Repositories\Interfaces\FileRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FileRepositoryInterface::class, FileRepository::class);
    }
}
