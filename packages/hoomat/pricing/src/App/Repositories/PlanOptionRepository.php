<?php

namespace Hoomat\Pricing\App\Repositories;

use Hoomat\Base\App\Repositories\BaseRepository;
use Hoomat\Pricing\App\Models\PlanOption;
use Hoomat\Pricing\App\Repositories\Interfaces\PlanOptionRepositoryInterface;
use Hoomat\Pricing\App\Scopes\PlanOption\PlanOptionFilterScope;
use Hoomat\Pricing\App\Scopes\PlanOption\PlanOptionLoadScope;
use Hoomat\Pricing\App\Scopes\PlanOption\PlanOptionSearchScope;
use Hoomat\Pricing\App\Scopes\PlanOption\PlanOptionSortScope;

class PlanOptionRepository extends BaseRepository implements PlanOptionRepositoryInterface
{
    public function __construct(
        PlanOption $model,
        PlanOptionFilterScope $filterScope,
        PlanOptionSortScope $sortScope,
        PlanOptionSearchScope $searchScope,
        PlanOptionLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}