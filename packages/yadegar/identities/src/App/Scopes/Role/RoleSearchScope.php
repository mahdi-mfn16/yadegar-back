<?php

namespace Yadegar\Identities\App\Scopes\Role;

use Yadegar\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

class RoleSearchScope extends SearchScope
{
    public function normalSearch($term): Builder
    {
        return $this->builder->where('name', 'LIKE', "%$term%");
    }
}
