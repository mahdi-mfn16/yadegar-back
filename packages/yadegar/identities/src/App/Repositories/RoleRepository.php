<?php

namespace Yadegar\Identities\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Identities\App\Models\Role;
use Yadegar\Identities\App\Repositories\Interfaces\RoleRepositoryInterface;
use Yadegar\Identities\App\Scopes\Role\RoleFilterScope;
use Yadegar\Identities\App\Scopes\Role\RoleLoadScope;
use Yadegar\Identities\App\Scopes\Role\RoleSearchScope;
use Yadegar\Identities\App\Scopes\Role\RoleSortScope;

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
