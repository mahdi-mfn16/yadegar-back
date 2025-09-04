<?php

namespace Yadegar\Learn\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Learn\App\Models\Box;
use Yadegar\Learn\App\Models\DTOs\BoxDTO;
use Yadegar\Learn\App\Http\Requests\Box\BoxIndexRequest;
use Yadegar\Learn\App\Http\Requests\Box\BoxStoreRequest;
use Yadegar\Learn\App\Http\Requests\Box\BoxUpdateRequest;
use Yadegar\Learn\App\Http\Resources\BoxResource;
use Yadegar\Learn\App\Services\BoxService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

/**
 * @group Yadegar\Learn
 * @subgroup Box
 */
class BoxController extends Controller
{
    public function __construct(
        private readonly BoxService $boxService
    )
    {}


    /**
     * Box Index
     *
     * @param BoxIndexRequest $request
     * @return JsonResponse
     */
    public function index(BoxIndexRequest $request): JsonResponse
    {
        Gate::authorize('viewAny', [Box::class]);
        $items = $this->boxService->index();
        return $this->dynamicResponse($items, BoxResource::class);
    }


    /**
     * Box Single
     *
     * @param Box $box
     * @return JsonResponse
     */
    public function show(Box $box): JsonResponse
    {
        Gate::authorize('view', $box);
        $item = $this->boxService->show($box->id);
        return $this->dynamicResponse($item, BoxResource::class);
    }


    /**
     * Box Store
     *
     * @param BoxStoreRequest $request
     * @return JsonResponse
     */
    public function store(BoxStoreRequest $request): JsonResponse
    {
        Gate::authorize('create', [Box::class]);
        $item = $this->boxService->create(BoxDTO::fromRequest($request));
        $item = $this->boxService->show($item->id);
        return $this->dynamicResponse($item, BoxResource::class);
    }


    /**
     * Box Update
     *
     * @param BoxUpdateRequest $request
     * @param Box $box
     * @return JsonResponse
     */
    public function update(BoxUpdateRequest $request, Box $box): JsonResponse
    {
        Gate::authorize('update', $box);
        $this->boxService->update($box, BoxDTO::fromModel($box, $request->all()));
        $item = $this->boxService->show($box->id);
        return $this->dynamicResponse($item, BoxResource::class);
    }


    /**
     * Box Delete
     *
     * @param Box $box
     * @return JsonResponse
     */
    public function destroy(Box $box): JsonResponse
    {
        Gate::authorize('delete', $box);
        $this->boxService->delete($box);
        return $this->successResponse();
    }
}