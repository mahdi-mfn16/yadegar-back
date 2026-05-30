<?php

namespace Yadegar\Filesystem\Providers;

use Yadegar\Filesystem\App\Repositories\FileRepository;
use Yadegar\Filesystem\App\Repositories\Interfaces\FileRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FileRepositoryInterface::class, FileRepository::class);
    }
}
