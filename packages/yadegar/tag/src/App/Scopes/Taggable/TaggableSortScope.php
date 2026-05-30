<?php

namespace Yadegar\Tag\App\Scopes\Taggable;

use Yadegar\Base\App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Builder;

class TaggableSortScope extends SortScope
{
    public function created_at($term): Builder
    {
        return $this->builder->orderBy('created_at', $term);
    }
}