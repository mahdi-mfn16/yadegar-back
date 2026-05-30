<?php

namespace Yadegar\Memory\App\Scopes\Memory;

use Yadegar\Base\App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Builder;

class MemorySortScope extends SortScope
{
    public function created_at($term): Builder
    {
        return $this->builder->orderBy('created_at', $term);
    }
}