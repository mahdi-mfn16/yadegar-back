<?php

namespace Yadegar\Identities\App\Scopes\Role;

use Yadegar\Base\App\Scopes\EagerLoadScope;
use Illuminate\Database\Eloquent\Builder;

class RoleLoadScope extends EagerLoadScope
{
    public function permissions(): Builder
    {
        return $this->builder->with(['permissions']);
    }
}
