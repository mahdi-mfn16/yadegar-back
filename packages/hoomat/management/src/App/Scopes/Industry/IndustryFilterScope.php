<?php

namespace Hoomat\Management\App\Scopes\Industry;

use Hoomat\Base\App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Builder;

class IndustryFilterScope extends FilterScope
{
    public function is_customer($term): Builder
    {
        return $this->builder->where('is_customer', $term);
    }
}
