<?php

namespace Learnbox\Learn\App\Services;

use Learnbox\Base\App\Services\BaseService;
use Learnbox\Learn\App\Repositories\Interfaces\UserProgressRepositoryInterface;

class UserProgressService extends BaseService
{
    public function __construct(UserProgressRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}