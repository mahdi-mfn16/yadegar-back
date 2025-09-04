<?php

namespace Yadegar\Notifications\App\Traits;

use Yadegar\Notifications\App\Models\Notification;

trait HasNotification
{
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifable');
    }
}
