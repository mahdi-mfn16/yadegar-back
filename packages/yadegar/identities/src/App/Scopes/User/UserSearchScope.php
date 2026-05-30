<?php

namespace Yadegar\Identities\App\Scopes\User;

use Yadegar\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

class UserSearchScope extends SearchScope
{
    public function normalSearch($term): Builder
    {
        return $this->builder
            ->where(function (Builder $query) use ($term) {
                $query->where('first_name', 'LIKE', "%$term%")
                    ->orWhere('last_name', 'LIKE', "%$term%");
            });
    }
}
