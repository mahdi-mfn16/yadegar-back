<?php

namespace Yadegar\Memory\App\Scopes\Memory;

use Yadegar\Base\App\Scopes\EagerLoadScope;
use Illuminate\Database\Eloquent\Builder;

class MemoryLoadScope extends EagerLoadScope
{
    public function user(): Builder
    {
        return $this->builder->with(['user' => ['files']]);
    }

    public function files(): Builder
    {
        return $this->builder->with(['files']);
    }

    public function tags(): Builder
    {
        return $this->builder->with(['tags']);
    }
}