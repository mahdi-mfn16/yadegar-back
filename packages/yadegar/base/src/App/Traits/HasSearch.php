<?php

namespace Yadegar\Base\App\Traits;

use Yadegar\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

trait HasSearch
{
    public function scopeNormalSearch($query, SearchScope $search): Builder
    {
        return $search->apply($query);
    }
}
