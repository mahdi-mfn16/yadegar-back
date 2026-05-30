<?php

namespace Yadegar\Tag\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Tag\App\Models\Taggable;
use Yadegar\Tag\App\Models\DTOs\TaggableDTO;
use Yadegar\Tag\App\Http\Requests\Taggable\TaggableIndexRequest;
use Yadegar\Tag\App\Http\Requests\Taggable\TaggableStoreRequest;
use Yadegar\Tag\App\Http\Requests\Taggable\TaggableUpdateRequest;
use Yadegar\Tag\App\Http\Resources\TaggableResource;
use Yadegar\Tag\App\Services\TaggableService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

/**
 * @group Yadegar\Tag
 * @subgroup Taggable
 */
class TaggableController extends Controller
{
    public function __construct(
        private readonly TaggableService $taggableService
    )
    {}


    /**
     * Taggable Index
     *
     * @param TaggableIndexRequest $request
     * @return JsonResponse
     */
    public function index(TaggableIndexRequest $request): JsonResponse
    {
        Gate::authorize('viewAny', [Taggable::class]);
        $items = $this->taggableService->index();
        return $this->dynamicResponse($items, TaggableResource::class);
    }


    /**
     * Taggable Single
     *
     * @param Taggable $taggable
     * @return JsonResponse
     */
    public function show(Taggable $taggable): JsonResponse
    {
        Gate::authorize('view', $taggable);
        $item = $this->taggableService->show($taggable->id);
        return $this->dynamicResponse($item, TaggableResource::class);
    }


    /**
     * Taggable Store
     *
     * @param TaggableStoreRequest $request
     * @return JsonResponse
     */
    public function store(TaggableStoreRequest $request): JsonResponse
    {
        Gate::authorize('create', [Taggable::class]);
        $item = $this->taggableService->create(TaggableDTO::fromRequest($request));
        $item = $this->taggableService->show($item->id);
        return $this->dynamicResponse($item, TaggableResource::class);
    }


    /**
     * Taggable Update
     *
     * @param TaggableUpdateRequest $request
     * @param Taggable $taggable
     * @return JsonResponse
     */
    public function update(TaggableUpdateRequest $request, Taggable $taggable): JsonResponse
    {
        Gate::authorize('update', $taggable);
        $this->taggableService->update($taggable, TaggableDTO::fromModel($taggable, $request->all()));
        $item = $this->taggableService->show($taggable->id);
        return $this->dynamicResponse($item, TaggableResource::class);
    }


    /**
     * Taggable Delete
     *
     * @param Taggable $taggable
     * @return JsonResponse
     */
    public function destroy(Taggable $taggable): JsonResponse
    {
        Gate::authorize('delete', $taggable);
        $this->taggableService->delete($taggable);
        return $this->successResponse();
    }
}