<?php

namespace Yadegar\Filesystem\App\Scopes;

use Yadegar\Base\App\Scopes\EagerLoadScope;
use Illuminate\Database\Eloquent\Builder;

class FileLoadScope extends EagerLoadScope
{
    public function user(): Builder
    {
        return $this->builder->with(['user' => ['files']]);
    }
}
