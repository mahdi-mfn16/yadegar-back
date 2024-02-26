<?php

namespace Hoomat\Pricing\App\Http\Controllers;

use Hoomat\Base\App\Http\Controllers\Controller;
use Hoomat\Pricing\App\Models\PlanOption;
use Hoomat\Pricing\App\Models\DTOs\PlanOptionDTO;
use Hoomat\Pricing\App\Http\Requests\PlanOption\PlanOptionIndexRequest;
use Hoomat\Pricing\App\Http\Requests\PlanOption\PlanOptionStoreRequest;
use Hoomat\Pricing\App\Http\Requests\PlanOption\PlanOptionUpdateRequest;
use Hoomat\Pricing\App\Http\Resources\PlanOptionResource;
use Hoomat\Pricing\App\Services\PlanOptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

/**
 * @group Hoomat\Pricing
 * @subgroup PlanOption
 */
class PlanOptionController extends Controller
{
    public function __construct(
        private readonly PlanOptionService $planOptionService
    )
    {}


    /**
     * PlanOption Index
     *
     * @param PlanOptionIndexRequest $request
     * @return JsonResponse
     */
    public function index(PlanOptionIndexRequest $request): JsonResponse
    {
        Gate::authorize('viewAny', [PlanOption::class]);
        $items = $this->planOptionService->index();
        return $this->dynamicResponse($items, PlanOptionResource::class);
    }


    /**
     * PlanOption Single
     *
     * @param PlanOption $planOption
     * @return JsonResponse
     */
    public function show(PlanOption $planOption): JsonResponse
    {
        Gate::authorize('view', $planOption);
        $item = $this->planOptionService->show($planOption->id);
        return $this->dynamicResponse($item, PlanOptionResource::class);
    }


    /**
     * PlanOption Store
     *
     * @param PlanOptionStoreRequest $request
     * @return JsonResponse
     */
    public function store(PlanOptionStoreRequest $request): JsonResponse
    {
        Gate::authorize('create', [PlanOption::class]);
        $item = $this->planOptionService->create(PlanOptionDTO::fromRequest($request));
        $item = $this->planOptionService->show($item->id);
        return $this->dynamicResponse($item, PlanOptionResource::class);
    }


    /**
     * PlanOption Update
     *
     * @param PlanOptionUpdateRequest $request
     * @param PlanOption $planOption
     * @return JsonResponse
     */
    public function update(PlanOptionUpdateRequest $request, PlanOption $planOption): JsonResponse
    {
        Gate::authorize('update', $planOption);
        $this->planOptionService->update($planOption, PlanOptionDTO::fromModel($planOption, $request->all()));
        $item = $this->planOptionService->show($planOption->id);
        return $this->dynamicResponse($item, PlanOptionResource::class);
    }


    /**
     * PlanOption Delete
     *
     * @param PlanOption $planOption
     * @return JsonResponse
     */
    public function destroy(PlanOption $planOption): JsonResponse
    {
        Gate::authorize('delete', $planOption);
        $this->planOptionService->delete($planOption);
        return $this->successResponse();
    }
}