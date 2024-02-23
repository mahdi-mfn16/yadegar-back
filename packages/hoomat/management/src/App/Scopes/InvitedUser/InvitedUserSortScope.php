<?php

namespace Hoomat\Management\App\Scopes\InvitedUser;

use Hoomat\Base\App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Builder;

class InvitedUserSortScope extends SortScope
{
    public function created_at($term): Builder
    {
        return $this->builder->orderBy('created_at', $term);
    }
}
