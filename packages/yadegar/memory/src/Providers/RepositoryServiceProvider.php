<?php

namespace Yadegar\Memory\Providers;

use Illuminate\Support\ServiceProvider;
use Yadegar\Memory\App\Repositories\FolderRepository;
use Yadegar\Memory\App\Repositories\Interfaces\FolderRepositoryInterface;
use Yadegar\Memory\App\Repositories\Interfaces\MemoryRepositoryInterface;
use Yadegar\Memory\App\Repositories\MemoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FolderRepositoryInterface::class, FolderRepository::class);
        $this->app->bind(MemoryRepositoryInterface::class, MemoryRepository::class);
    }
}
