<?php

namespace Learnbox\Identities\Providers;

use Learnbox\Identities\App\Repositories\Interfaces\PermissionRepositoryInterface;
use Learnbox\Identities\App\Repositories\Interfaces\RoleRepositoryInterface;
use Learnbox\Identities\App\Repositories\Interfaces\UserRepositoryInterface;
use Learnbox\Identities\App\Repositories\PermissionRepository;
use Learnbox\Identities\App\Repositories\RoleRepository;
use Learnbox\Identities\App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
    }
}
