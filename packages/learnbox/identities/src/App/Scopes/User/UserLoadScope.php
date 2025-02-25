<?php

namespace Learnbox\Identities\App\Scopes\User;

use Learnbox\Base\App\Scopes\EagerLoadScope;
use Illuminate\Database\Eloquent\Builder;

class UserLoadScope extends EagerLoadScope
{
    public function files(): Builder
    {
        return $this->builder->with(['files']);
    }

    public function role(): Builder
    {
        return $this->builder->with(['role']);
    }
  
}
