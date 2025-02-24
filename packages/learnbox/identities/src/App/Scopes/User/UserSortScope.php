<?php

namespace Learnbox\Identities\App\Scopes\User;

use Learnbox\Base\App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Builder;

class UserSortScope extends SortScope
{
    public function birth_date($term): Builder
    {
        return $this->builder->orderBy('birth_date', $term);
    }


    public function created_at($term): Builder
    {
        return $this->builder->orderBy('created_at', $term);
    }
}
