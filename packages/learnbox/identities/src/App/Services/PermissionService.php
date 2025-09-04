<?php

namespace Yadegar\Identities\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Identities\App\Repositories\Interfaces\PermissionRepositoryInterface;

class PermissionService extends BaseService
{
    public function __construct(PermissionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
