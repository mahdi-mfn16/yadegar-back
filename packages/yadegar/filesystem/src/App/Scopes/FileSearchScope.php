<?php

namespace Yadegar\Filesystem\App\Scopes;

use Yadegar\Base\App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Builder;

class FileSearchScope extends SearchScope
{
    public function normalSearch($term): Builder
    {
        return $this->builder;
    }
}
