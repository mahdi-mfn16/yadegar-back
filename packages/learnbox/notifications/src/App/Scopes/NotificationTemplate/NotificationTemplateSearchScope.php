<?php

namespace Learnbox\Notifications\App\Scopes\NotificationTemplate;

use Learnbox\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

class NotificationTemplateSearchScope extends SearchScope
{
    public function normalSearch($keyword): Builder
    {
        return $this->builder
            ->Where('name', 'LIKE', "%$keyword%");
    }
}
