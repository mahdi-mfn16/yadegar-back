<?php

namespace Hoomat\Management\App\Scopes\InvitedUser;

use Hoomat\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

class InvitedUserSearchScope extends SearchScope
{
    public function normalSearch($term): Builder
    {
        return $this->builder->where('name', 'LIKE', "%$term%");
    }
}
