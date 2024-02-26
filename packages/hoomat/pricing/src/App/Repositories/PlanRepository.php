<?php

namespace Hoomat\Pricing\App\Repositories;

use Hoomat\Base\App\Repositories\BaseRepository;
use Hoomat\Pricing\App\Models\Plan;
use Hoomat\Pricing\App\Repositories\Interfaces\PlanRepositoryInterface;
use Hoomat\Pricing\App\Scopes\Plan\PlanFilterScope;
use Hoomat\Pricing\App\Scopes\Plan\PlanLoadScope;
use Hoomat\Pricing\App\Scopes\Plan\PlanSearchScope;
use Hoomat\Pricing\App\Scopes\Plan\PlanSortScope;

class PlanRepository extends BaseRepository implements PlanRepositoryInterface
{
    public function __construct(
        Plan $model,
        PlanFilterScope $filterScope,
        PlanSortScope $sortScope,
        PlanSearchScope $searchScope,
        PlanLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}