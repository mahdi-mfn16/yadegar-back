<?php

namespace Learnbox\Base\App\Traits;

use Learnbox\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

trait HasSearch
{
    public function scopeNormalSearch($query, SearchScope $search): Builder
    {
        return $search->apply($query);
    }
}
