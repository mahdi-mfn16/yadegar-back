<?php

namespace Yadegar\Notifications\App\Scopes\NotificationLog;

use Yadegar\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

class NotificationLogSearchScope extends SearchScope
{
    public function normalSearch($keyword): Builder
    {
        return $this->builder
            ->whereHas('receiver', function ($query) use ($keyword) {
                $query->where('first_name', 'LIKE', "%$keyword%")
                    ->orWhere('last_name', 'LIKE', "%$keyword%");
            });
    }
}
