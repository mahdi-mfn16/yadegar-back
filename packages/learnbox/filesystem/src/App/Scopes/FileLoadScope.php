<?php

namespace Learnbox\Filesystem\App\Scopes;

use Learnbox\Base\App\Scopes\EagerLoadScope;
use Illuminate\Database\Eloquent\Builder;

class FileLoadScope extends EagerLoadScope
{
    public function user(): Builder
    {
        return $this->builder->with(['user' => ['files']]);
    }
}
