<?php

namespace Yadegar\Notifications\App\Listeners;

use Yadegar\Notifications\App\Events\NewNotificationEvent;
use Yadegar\Notifications\App\Jobs\SendNotificationJob;
use Yadegar\Notifications\App\Jobs\UpdateNotificationStatusJob;

class NewNotificationListener
{
    public function handle(NewNotificationEvent $event): void
    {
        $notif = $event->notification;
        if ($notif->type !== ['in-app']) {
            foreach ($notif->logs as $log) {
                SendNotificationJob::dispatch($log)->delay($notif->send_at);
            }
        }
        UpdateNotificationStatusJob::dispatch($notif)->delay($notif->send_at);
    }
}
