<?php

namespace Yadegar\Learn\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Learn\App\Repositories\Interfaces\BoxRepositoryInterface;

class BoxService extends BaseService
{
    public function __construct(BoxRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}