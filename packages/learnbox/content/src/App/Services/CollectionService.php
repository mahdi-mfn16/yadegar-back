<?php

namespace Learnbox\Content\App\Services;

use Learnbox\Base\App\Services\BaseService;
use Learnbox\Content\App\Repositories\Interfaces\CollectionRepositoryInterface;

class CollectionService extends BaseService
{
    public function __construct(CollectionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}