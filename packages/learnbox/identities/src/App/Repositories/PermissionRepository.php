<?php

namespace Yadegar\Identities\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Identities\App\Models\Permission;
use Yadegar\Identities\App\Repositories\Interfaces\PermissionRepositoryInterface;
use Yadegar\Identities\App\Scopes\Permission\PermissionFilterScope;
use Yadegar\Identities\App\Scopes\Permission\PermissionLoadScope;
use Yadegar\Identities\App\Scopes\Permission\PermissionSearchScope;
use Yadegar\Identities\App\Scopes\Permission\PermissionSortScope;

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
