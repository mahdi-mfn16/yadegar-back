<?php

namespace Hoomat\Management\App\Scopes\Organization;

use Hoomat\Base\App\Scopes\EagerLoadScope;
use Illuminate\Database\Eloquent\Builder;


class OrganizationLoadScope extends EagerLoadScope
{
    public function user(): Builder
    {
        return $this->builder->with(['user']);
    }


    public function websites(): Builder
    {
        return $this->builder->with(['websites']);
    }


    public function invitedUsers(): Builder
    {
        return $this->builder->with(['invitedUsers']);
    }
}
