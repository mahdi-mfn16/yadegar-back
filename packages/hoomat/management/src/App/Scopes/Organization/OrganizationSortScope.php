<?php

namespace Hoomat\Management\App\Scopes\Organization;

use Hoomat\Base\App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Builder;

class OrganizationSortScope extends SortScope
{
    public function created_at($term): Builder
    {
        return $this->builder->orderBy('created_at', $term);
    }
}
