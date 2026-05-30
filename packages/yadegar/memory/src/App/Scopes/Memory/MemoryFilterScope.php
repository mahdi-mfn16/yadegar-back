<?php

namespace Yadegar\Memory\App\Scopes\Memory;

use Yadegar\Base\App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Builder;

class MemoryFilterScope extends FilterScope
{
    public function user($term): Builder
    {
        return $this->builder->where('user_id', $term);
    }
}