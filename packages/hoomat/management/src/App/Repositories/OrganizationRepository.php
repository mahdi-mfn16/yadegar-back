<?php

namespace Hoomat\Management\App\Repositories;

use Hoomat\Base\App\Repositories\BaseRepository;
use Hoomat\Management\App\Models\Organization;
use Hoomat\Management\App\Repositories\Interfaces\OrganizationRepositoryInterface;
use Hoomat\Management\App\Scopes\Organization\OrganizationFilterScope;
use Hoomat\Management\App\Scopes\Organization\OrganizationLoadScope;
use Hoomat\Management\App\Scopes\Organization\OrganizationSearchScope;
use Hoomat\Management\App\Scopes\Organization\OrganizationSortScope;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{
    public function __construct(
        Organization $model,
        OrganizationFilterScope $filterScope,
        OrganizationSortScope $sortScope,
        OrganizationSearchScope $searchScope,
        OrganizationLoadScope $loadScope
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }



}
