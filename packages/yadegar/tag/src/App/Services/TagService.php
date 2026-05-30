<?php

namespace Yadegar\Tag\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Tag\App\Repositories\Interfaces\TagRepositoryInterface;

class TagService extends BaseService
{
    public function __construct(TagRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}