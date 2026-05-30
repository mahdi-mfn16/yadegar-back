<?php

namespace Yadegar\Base\App\Traits;

use Yadegar\Base\App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilter($query, FilterScope $filters): Builder
    {
        return $filters->apply($query);
    }
}
