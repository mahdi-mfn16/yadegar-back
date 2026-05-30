<?php

namespace Yadegar\Identities\App\Scopes\User;

use Yadegar\Base\App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Builder;

class UserFilterScope extends FilterScope
{
    public function gender($term): Builder
    {
        return $this->builder->where('gender', $term);
    }
}
