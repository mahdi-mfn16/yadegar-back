<?php

namespace Yadegar\Content\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Content\App\Repositories\Interfaces\UserCardRepositoryInterface;

class UserCardService extends BaseService
{
    public function __construct(UserCardRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}