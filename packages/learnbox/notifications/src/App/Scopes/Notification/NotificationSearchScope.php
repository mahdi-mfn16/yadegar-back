<?php

namespace Learnbox\Notifications\App\Scopes\Notification;

use Learnbox\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

class NotificationSearchScope extends SearchScope
{
    public function normalSearch($keyword): Builder
    {
        return $this->builder
            ->Where('text', 'LIKE', "%$keyword%")
            ->orWhereHas('sentBy', function ($query) use ($keyword) {
                $query->where('first_name', 'LIKE', "%$keyword%")
                    ->orWhere('last_name', 'LIKE', "%$keyword%");
            });
    }
}
