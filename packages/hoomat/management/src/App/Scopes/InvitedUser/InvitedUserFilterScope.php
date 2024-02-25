<?php

namespace Hoomat\Management\App\Scopes\InvitedUser;

use Hoomat\Base\App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Builder;

class InvitedUserFilterScope extends FilterScope
{
    public function organization($term): Builder
    {
        return $this->builder->where('organization_id', $term);
    }
}
