<?php

namespace Hoomat\Pricing\App\Scopes\Plan;

use Hoomat\Base\App\Scopes\EagerLoadScope;
use Illuminate\Database\Eloquent\Builder;

class PlanLoadScope extends EagerLoadScope
{
    public function options(): Builder
    {
        return $this->builder->with(['options']);
    }
}