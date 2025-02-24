<?php

namespace Learnbox\Identities\App\Scopes\Role;

use Learnbox\Base\App\Scopes\EagerLoadScope;
use Illuminate\Database\Eloquent\Builder;

class RoleLoadScope extends EagerLoadScope
{
    public function permissions(): Builder
    {
        return $this->builder->with(['permissions']);
    }
}
