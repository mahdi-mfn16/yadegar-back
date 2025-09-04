<?php

namespace Yadegar\Learn\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Learn\App\Repositories\Interfaces\UserProgressRepositoryInterface;

class UserProgressService extends BaseService
{
    public function __construct(UserProgressRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}