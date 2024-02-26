<?php

namespace Hoomat\Pricing\App\Services;

use Hoomat\Base\App\Services\BaseService;
use Hoomat\Pricing\App\Repositories\Interfaces\PlanOptionRepositoryInterface;

class PlanOptionService extends BaseService
{
    public function __construct(PlanOptionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}