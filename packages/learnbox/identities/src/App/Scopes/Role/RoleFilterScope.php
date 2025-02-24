<?php

namespace Learnbox\Identities\App\Scopes\Role;

use Learnbox\Base\App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Builder;

class RoleFilterScope extends FilterScope
{
    public function is_customer($term): Builder
    {
        return $this->builder->where('is_customer', $term);
    }


}
