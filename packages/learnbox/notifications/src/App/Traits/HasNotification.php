<?php

namespace Learnbox\Notifications\App\Traits;

use Learnbox\Notifications\App\Models\Notification;

trait HasNotification
{
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifable');
    }
}
