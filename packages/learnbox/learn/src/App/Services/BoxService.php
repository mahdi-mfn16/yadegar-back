<?php

namespace Learnbox\Learn\App\Services;

use Learnbox\Base\App\Services\BaseService;
use Learnbox\Learn\App\Repositories\Interfaces\BoxRepositoryInterface;

class BoxService extends BaseService
{
    public function __construct(BoxRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}