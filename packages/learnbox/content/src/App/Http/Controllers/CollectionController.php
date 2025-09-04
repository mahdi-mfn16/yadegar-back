<?php

namespace Yadegar\Content\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Content\App\Models\Collection;
use Yadegar\Content\App\Models\DTOs\CollectionDTO;
use Yadegar\Content\App\Http\Requests\Collection\CollectionIndexRequest;
use Yadegar\Content\App\Http\Requests\Collection\CollectionStoreRequest;
use Yadegar\Content\App\Http\Requests\Collection\CollectionUpdateRequest;
use Yadegar\Content\App\Http\Resources\CollectionResource;
use Yadegar\Content\App\Services\CollectionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

/**
 * @group Yadegar\Content
 * @subgroup Collection
 */
class CollectionController extends Controller
{
    public function __construct(
        private readonly CollectionService $collectionService
    )
    {}


    /**
     * Collection Index
     *
     * @param CollectionIndexRequest $request
     * @return JsonResponse
     */
    public function index(CollectionIndexRequest $request): JsonResponse
    {
        Gate::authorize('viewAny', [Collection::class]);
        $items = $this->collectionService->index();
        return $this->dynamicResponse($items, CollectionResource::class);
    }


    /**
     * Collection Single
     *
     * @param Collection $collection
     * @return JsonResponse
     */
    public function show(Collection $collection): JsonResponse
    {
        Gate::authorize('view', $collection);
        $item = $this->collectionService->show($collection->id);
        return $this->dynamicResponse($item, CollectionResource::class);
    }


    /**
     * Collection Store
     *
     * @param CollectionStoreRequest $request
     * @return JsonResponse
     */
    public function store(CollectionStoreRequest $request): JsonResponse
    {
        Gate::authorize('create', [Collection::class]);
        $item = $this->collectionService->create(CollectionDTO::fromRequest($request));
        $item = $this->collectionService->show($item->id);
        return $this->dynamicResponse($item, CollectionResource::class);
    }


    /**
     * Collection Update
     *
     * @param CollectionUpdateRequest $request
     * @param Collection $collection
     * @return JsonResponse
     */
    public function update(CollectionUpdateRequest $request, Collection $collection): JsonResponse
    {
        Gate::authorize('update', $collection);
        $this->collectionService->update($collection, CollectionDTO::fromModel($collection, $request->all()));
        $item = $this->collectionService->show($collection->id);
        return $this->dynamicResponse($item, CollectionResource::class);
    }


    /**
     * Collection Delete
     *
     * @param Collection $collection
     * @return JsonResponse
     */
    public function destroy(Collection $collection): JsonResponse
    {
        Gate::authorize('delete', $collection);
        $this->collectionService->delete($collection);
        return $this->successResponse();
    }
}