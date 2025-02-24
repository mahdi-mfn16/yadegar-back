<?php

namespace Learnbox\Identities\App\Scopes\Permission;

use Learnbox\Base\App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Builder;

class PermissionSortScope extends SortScope
{
    public function created_at($term): Builder
    {
        return $this->builder->orderBy('created_at', $term);
    }
}
