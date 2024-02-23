<?php

namespace Hoomat\Management\App\Services;

use Hoomat\Base\App\Services\BaseService;
use Hoomat\Management\App\Repositories\Interfaces\WebsiteRepositoryInterface;

class WebsiteService extends BaseService
{
    public function __construct(WebsiteRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }


    public function getWebsites($request)
    {
        return $this->repository->get();
    }

    
}
