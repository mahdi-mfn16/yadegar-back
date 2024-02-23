<?php

namespace Hoomat\Management\App\Services;

use Hoomat\Base\App\Services\BaseService;
use Hoomat\Management\App\Repositories\Interfaces\IndustryRepositoryInterface;

class IndustryService extends BaseService
{
    public function __construct(IndustryRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }


    public function getIndustries($request)
    {
        return $this->repository->get();
    }
}
