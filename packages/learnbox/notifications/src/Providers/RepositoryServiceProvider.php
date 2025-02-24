<?php

namespace Learnbox\Notifications\Providers;

use Learnbox\Notifications\App\Repositories\Interfaces\NotificationLogRepositoryInterface;
use Learnbox\Notifications\App\Repositories\Interfaces\NotificationRepositoryInterface;
use Learnbox\Notifications\App\Repositories\Interfaces\NotificationTemplateRepositoryInterface;
use Learnbox\Notifications\App\Repositories\NotificationLogRepository;
use Learnbox\Notifications\App\Repositories\NotificationRepository;
use Learnbox\Notifications\App\Repositories\NotificationTemplateRepository;
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
