<?php

namespace Learnbox\Content\App\Services;

use Learnbox\Base\App\Services\BaseService;
use Learnbox\Content\App\Repositories\Interfaces\UserCollectionRepositoryInterface;

class UserCollectionService extends BaseService
{
    public function __construct(UserCollectionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}