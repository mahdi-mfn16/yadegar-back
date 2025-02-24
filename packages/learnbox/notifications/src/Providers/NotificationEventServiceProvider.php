<?php

namespace Learnbox\Notifications\Providers;

use Learnbox\Notifications\App\Events\NewNotificationEvent;
use Learnbox\Notifications\App\Listeners\NewNotificationListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class NotificationEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        NewNotificationEvent::class => [
            NewNotificationListener::class,
        ],
    ];


    public function boot(): void
    {
        parent::boot();
    }
}
