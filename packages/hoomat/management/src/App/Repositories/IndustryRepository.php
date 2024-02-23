<?php

namespace Hoomat\Management\App\Repositories;

use Hoomat\Base\App\Repositories\BaseRepository;
use Hoomat\Management\App\Models\Industry;
use Hoomat\Management\App\Repositories\Interfaces\IndustryRepositoryInterface;
use Hoomat\Management\App\Scopes\Industry\IndustryFilterScope;
use Hoomat\Management\App\Scopes\Industry\IndustryLoadScope;
use Hoomat\Management\App\Scopes\Industry\IndustrySearchScope;
use Hoomat\Management\App\Scopes\Industry\IndustrySortScope;

class IndustryRepository extends BaseRepository implements IndustryRepositoryInterface
{
    public function __construct(
        Industry $model,
        IndustryFilterScope $filterScope,
        IndustrySortScope $sortScope,
        IndustrySearchScope $searchScope,
        IndustryLoadScope $loadScope
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}
