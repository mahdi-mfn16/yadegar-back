<?php

namespace Learnbox\Identities\App\Repositories;

use Learnbox\Base\App\Repositories\BaseRepository;
use Learnbox\Identities\App\Models\Role;
use Learnbox\Identities\App\Repositories\Interfaces\RoleRepositoryInterface;
use Learnbox\Identities\App\Scopes\Role\RoleFilterScope;
use Learnbox\Identities\App\Scopes\Role\RoleLoadScope;
use Learnbox\Identities\App\Scopes\Role\RoleSearchScope;
use Learnbox\Identities\App\Scopes\Role\RoleSortScope;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(
        Role $model,
        RoleFilterScope $filterScope,
        RoleSortScope $sortScope,
        RoleSearchScope $searchScope,
        RoleLoadScope $loadScope
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}
