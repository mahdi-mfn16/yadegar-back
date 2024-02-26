<?php

namespace Hoomat\Management\App\Services;

use Hoomat\Base\App\Services\BaseService;
use Hoomat\Management\App\Models\DTOs\WebsiteDTO;
use Hoomat\Management\App\Repositories\Interfaces\WebsiteRepositoryInterface;
use Hoomat\Pricing\App\Repositories\Interfaces\PlanRepositoryInterface;

class WebsiteService extends BaseService
{
    public function __construct(
        WebsiteRepositoryInterface $repository,
        private PlanRepositoryInterface $planRepo
        )
    {
        parent::__construct($repository);
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
