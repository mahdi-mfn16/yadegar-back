<?php

namespace Learnbox\Content\App\Services;

use Learnbox\Base\App\Services\BaseService;
use Learnbox\Content\App\Repositories\Interfaces\UserCardRepositoryInterface;

class UserCardService extends BaseService
{
    public function __construct(UserCardRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}