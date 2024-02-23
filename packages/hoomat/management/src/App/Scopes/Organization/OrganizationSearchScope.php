<?php

namespace Hoomat\Management\App\Scopes\Organization;

use Hoomat\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

class OrganizationSearchScope extends SearchScope
{
    public function normalSearch($term): Builder
    {
        return $this->builder->where('title', 'LIKE', "%$term%");
    }
}
