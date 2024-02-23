<?php

namespace Hoomat\Management\App\Scopes\Industry;

use Hoomat\Base\App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Builder;

class IndustrySortScope extends SortScope
{
    public function created_at($term): Builder
    {
        return $this->builder->orderBy('created_at', $term);
    }
}
