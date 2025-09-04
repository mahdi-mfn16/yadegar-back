<?php

namespace Yadegar\Notifications\Providers;

use Yadegar\Notifications\App\Repositories\Interfaces\NotificationLogRepositoryInterface;
use Yadegar\Notifications\App\Repositories\Interfaces\NotificationRepositoryInterface;
use Yadegar\Notifications\App\Repositories\Interfaces\NotificationTemplateRepositoryInterface;
use Yadegar\Notifications\App\Repositories\NotificationLogRepository;
use Yadegar\Notifications\App\Repositories\NotificationRepository;
use Yadegar\Notifications\App\Repositories\NotificationTemplateRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);
        $this->app->bind(NotificationTemplateRepositoryInterface::class, NotificationTemplateRepository::class);
        $this->app->bind(NotificationLogRepositoryInterface::class, NotificationLogRepository::class);
    }
}
