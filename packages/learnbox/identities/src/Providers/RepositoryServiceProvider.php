<?php

namespace Yadegar\Identities\Providers;

use Yadegar\Identities\App\Repositories\Interfaces\PermissionRepositoryInterface;
use Yadegar\Identities\App\Repositories\Interfaces\RoleRepositoryInterface;
use Yadegar\Identities\App\Repositories\Interfaces\UserRepositoryInterface;
use Yadegar\Identities\App\Repositories\PermissionRepository;
use Yadegar\Identities\App\Repositories\RoleRepository;
use Yadegar\Identities\App\Repositories\UserRepository;
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
