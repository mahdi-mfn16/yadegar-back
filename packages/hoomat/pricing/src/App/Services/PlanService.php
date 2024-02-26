<?php

namespace Hoomat\Pricing\App\Services;

use Hoomat\Base\App\Services\BaseService;
use Hoomat\Pricing\App\Models\DTOs\PlanDTO;
use Hoomat\Pricing\App\Repositories\Interfaces\PlanRepositoryInterface;

class PlanService extends BaseService
{
    public function __construct(PlanRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }


    public function createPlan($request)
    {
        $optionIds = $request->input('options');
        $plan = $this->create(PlanDTO::fromArray($request->all()));
        if($optionIds){
            $plan->options()->sync($optionIds);
        }
        return $plan;
    }



    public function updatePlan($plan, $request)
    {
        $optionIds = $request->input('options');
        $this->update($plan, PlanDTO::fromModel($plan, $request->all()));
        if($optionIds){
            $plan->options()->sync($optionIds);
        }
        return $plan;
    }
}