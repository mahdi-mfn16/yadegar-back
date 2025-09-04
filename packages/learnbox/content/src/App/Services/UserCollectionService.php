<?php

namespace Yadegar\Content\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Content\App\Repositories\Interfaces\UserCollectionRepositoryInterface;

class UserCollectionService extends BaseService
{
    public function __construct(UserCollectionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}