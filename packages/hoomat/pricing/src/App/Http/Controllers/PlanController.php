<?php

namespace Hoomat\Pricing\App\Http\Controllers;

use Hoomat\Base\App\Http\Controllers\Controller;
use Hoomat\Pricing\App\Models\Plan;
use Hoomat\Pricing\App\Models\DTOs\PlanDTO;
use Hoomat\Pricing\App\Http\Requests\Plan\PlanIndexRequest;
use Hoomat\Pricing\App\Http\Requests\Plan\PlanStoreRequest;
use Hoomat\Pricing\App\Http\Requests\Plan\PlanUpdateOptionRequest;
use Hoomat\Pricing\App\Http\Requests\Plan\PlanUpdateRequest;
use Hoomat\Pricing\App\Http\Resources\PlanResource;
use Hoomat\Pricing\App\Services\PlanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

/**
 * @group Hoomat\Pricing
 * @subgroup Plan
 */
class PlanController extends Controller
{
    public function __construct(
        private readonly PlanService $planService
    )
    {}


    /**
     * Plan Index
     *
     * @param PlanIndexRequest $request
     * @return JsonResponse
     */
    public function index(PlanIndexRequest $request): JsonResponse
    {
        Gate::authorize('viewAny', [Plan::class]);
        $items = $this->planService->index();
        return $this->dynamicResponse($items, PlanResource::class);
    }


    /**
     * Plan Single
     *
     * @param Plan $plan
     * @return JsonResponse
     */
    public function show(Plan $plan): JsonResponse
    {
        Gate::authorize('view', $plan);
        $item = $this->planService->show($plan->id);
        return $this->dynamicResponse($item, PlanResource::class);
    }


    /**
     * Plan Store
     *
     * @param PlanStoreRequest $request
     * @return JsonResponse
     */
    public function store(PlanStoreRequest $request): JsonResponse
    {
        Gate::authorize('create', [Plan::class]);
        $item = $this->planService->create(PlanDTO::fromRequest($request));
        $item = $this->planService->show($item->id);
        return $this->dynamicResponse($item, PlanResource::class);
    }


    /**
     * Plan Update
     *
     * @param PlanUpdateRequest $request
     * @param Plan $plan
     * @return JsonResponse
     */
    public function update(PlanUpdateRequest $request, Plan $plan): JsonResponse
    {
        Gate::authorize('update', $plan);
        $this->planService->update($plan, PlanDTO::fromModel($plan, $request->all()));
        $item = $this->planService->show($plan->id);
        return $this->dynamicResponse($item, PlanResource::class);
    }


    /**
     * Plan Delete
     *
     * @param Plan $plan
     * @return JsonResponse
     */
    public function destroy(Plan $plan): JsonResponse
    {
        Gate::authorize('delete', $plan);
        $this->planService->delete($plan);
        return $this->successResponse();
    }


}