<?php

namespace Learnbox\Learn\App\Scopes\Box;

use Learnbox\Base\App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Builder;

class BoxSortScope extends SortScope
{
    public function created_at($term): Builder
    {
        return $this->builder->orderBy('created_at', $term);
    }
}