<?php

namespace Hoomat\Management\App\Services;

use Hoomat\Base\App\Services\BaseService;
use Hoomat\Management\App\Repositories\Interfaces\OrganizationRepositoryInterface;

class OrganizationService extends BaseService
{
    public function __construct(OrganizationRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }


    public function getOrganizations($request)
    {
        $data = $request->all();
        $data['filters']['user'] = auth('sanctum')->id();
        request()->merge($data);
        return $this->repository->get();
    }
}
