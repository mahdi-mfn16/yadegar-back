<?php

namespace Yadegar\Tag\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Tag\App\Repositories\Interfaces\TaggableRepositoryInterface;

class TaggableService extends BaseService
{
    public function __construct(TaggableRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}