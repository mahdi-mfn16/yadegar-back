<?php

namespace Learnbox\Identities\App\Services;

use Learnbox\Base\App\Services\BaseService;
use Learnbox\Identities\App\Repositories\Interfaces\PermissionRepositoryInterface;

class PermissionService extends BaseService
{
    public function __construct(PermissionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
