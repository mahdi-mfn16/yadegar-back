<?php

namespace Hoomat\Management\App\Services;

use Hoomat\Base\App\Services\BaseService;
use Hoomat\Management\App\Models\DTOs\WebsiteDTO;
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


    public function createWebsite($request)
    {
        $plan = $this->planRepo->getFilteredOne(['name' => 'basic']);
        $data = $request->all();
        $data['plan_id'] = $plan['id'];
        return $this->create(WebsiteDTO::fromArray($data));
    }


    public function transferWebsite($request, $website)
    {
        $organizationId = $request->input('organization_id');
        return $this->update($website, WebsiteDTO::fromArray(['organization_id' => $request->input('organization_id')]));
    }


    public function updatePlan($website, $request)
    {
        // make order and transaction to pay for plan
    }

    
}
