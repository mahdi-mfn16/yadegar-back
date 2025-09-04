<?php

namespace Yadegar\Content\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Content\App\Repositories\Interfaces\CollectionRepositoryInterface;

class CollectionService extends BaseService
{
    public function __construct(CollectionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}