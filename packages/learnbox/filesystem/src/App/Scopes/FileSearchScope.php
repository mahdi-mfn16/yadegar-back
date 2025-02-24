<?php

namespace Learnbox\Filesystem\App\Scopes;

use Learnbox\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

class FileSearchScope extends SearchScope
{
    public function normalSearch($term): Builder
    {
        return $this->builder;
    }
}
