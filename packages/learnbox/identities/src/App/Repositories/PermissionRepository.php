<?php

namespace Learnbox\Identities\App\Repositories;

use Learnbox\Base\App\Repositories\BaseRepository;
use Learnbox\Identities\App\Models\Permission;
use Learnbox\Identities\App\Repositories\Interfaces\PermissionRepositoryInterface;
use Learnbox\Identities\App\Scopes\Permission\PermissionFilterScope;
use Learnbox\Identities\App\Scopes\Permission\PermissionLoadScope;
use Learnbox\Identities\App\Scopes\Permission\PermissionSearchScope;
use Learnbox\Identities\App\Scopes\Permission\PermissionSortScope;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    public function __construct(
        Permission $model,
        PermissionFilterScope $filterScope,
        PermissionSortScope $sortScope,
        PermissionSearchScope $searchScope,
        PermissionLoadScope $loadScope
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}
