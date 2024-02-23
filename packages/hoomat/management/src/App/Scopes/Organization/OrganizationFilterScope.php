<?php

namespace Hoomat\Management\App\Scopes\Organization;

use Hoomat\Base\App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Builder;

class OrganizationFilterScope extends FilterScope
{
    public function user($term): Builder
    {
        return $this->builder->where('user_id', $term);
    }


}
