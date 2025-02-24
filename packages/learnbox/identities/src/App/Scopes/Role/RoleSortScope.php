<?php

namespace Learnbox\Identities\App\Scopes\Role;

use Learnbox\Base\App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Builder;

class RoleSortScope extends SortScope
{
    public function created_at($term): Builder
    {
        return $this->builder->orderBy('created_at', $term);
    }
}
