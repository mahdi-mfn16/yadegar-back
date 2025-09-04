<?php

namespace Yadegar\Base\App\Traits;

use Yadegar\Base\App\Scopes\EagerLoadScope;
use Illuminate\Database\Eloquent\Builder;

trait HasEagerLoad
{
    public function scopeEagerLoad($query, EagerLoadScope $load): Builder
    {
        return $load->apply($query);
    }
}
