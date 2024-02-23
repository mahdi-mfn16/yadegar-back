<?php

namespace Hoomat\Management\App\Scopes\InvitedUser;

use Hoomat\Base\App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Builder;

class InvitedUserFilterScope extends FilterScope
{
    public function is_customer($term): Builder
    {
        return $this->builder->where('is_customer', $term);
    }
}
