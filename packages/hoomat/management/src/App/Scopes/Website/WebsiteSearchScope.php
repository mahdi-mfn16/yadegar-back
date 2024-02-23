<?php

namespace Hoomat\Management\App\Scopes\Website;

use Hoomat\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

class WebsiteSearchScope extends SearchScope
{
    public function normalSearch($term): Builder
    {
        return $this->builder->where('name', 'LIKE', "%$term%");
    }
}
