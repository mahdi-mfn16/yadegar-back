<?php

namespace Learnbox\Identities\App\Scopes\Permission;

use Learnbox\Base\App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Builder;

class PermissionFilterScope extends FilterScope
{
    public function is_customer($term): Builder
    {
        return $this->builder->where('is_customer', $term);
    }
}
