<?php

namespace Yadegar\Notifications\Providers;

use Yadegar\Notifications\App\Events\NewNotificationEvent;
use Yadegar\Notifications\App\Listeners\NewNotificationListener;
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
