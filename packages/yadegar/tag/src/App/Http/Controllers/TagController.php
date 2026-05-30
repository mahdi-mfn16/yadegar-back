<?php

namespace Yadegar\Tag\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Tag\App\Models\Tag;
use Yadegar\Tag\App\Models\DTOs\TagDTO;
use Yadegar\Tag\App\Http\Requests\Tag\TagIndexRequest;
use Yadegar\Tag\App\Http\Requests\Tag\TagStoreRequest;
use Yadegar\Tag\App\Http\Requests\Tag\TagUpdateRequest;
use Yadegar\Tag\App\Http\Resources\TagResource;
use Yadegar\Tag\App\Services\TagService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

/**
 * @group Yadegar\Tag
 * @subgroup Tag
 */
class TagController extends Controller
{
    public function __construct(
        private readonly TagService $tagService
    )
    {}


    /**
     * Tag Index
     *
     * @param TagIndexRequest $request
     * @return JsonResponse
     */
    public function index(TagIndexRequest $request): JsonResponse
    {
        Gate::authorize('viewAny', [Tag::class]);
        $items = $this->tagService->index();
        return $this->dynamicResponse($items, TagResource::class);
    }


    /**
     * Tag Single
     *
     * @param Tag $tag
     * @return JsonResponse
     */
    public function show(Tag $tag): JsonResponse
    {
        Gate::authorize('view', $tag);
        $item = $this->tagService->show($tag->id);
        return $this->dynamicResponse($item, TagResource::class);
    }


    /**
     * Tag Store
     *
     * @param TagStoreRequest $request
     * @return JsonResponse
     */
    public function store(TagStoreRequest $request): JsonResponse
    {
        Gate::authorize('create', [Tag::class]);
        $item = $this->tagService->create(TagDTO::fromRequest($request));
        $item = $this->tagService->show($item->id);
        return $this->dynamicResponse($item, TagResource::class);
    }


    /**
     * Tag Update
     *
     * @param TagUpdateRequest $request
     * @param Tag $tag
     * @return JsonResponse
     */
    public function update(TagUpdateRequest $request, Tag $tag): JsonResponse
    {
        Gate::authorize('update', $tag);
        $this->tagService->update($tag, TagDTO::fromModel($tag, $request->all()));
        $item = $this->tagService->show($tag->id);
        return $this->dynamicResponse($item, TagResource::class);
    }


    /**
     * Tag Delete
     *
     * @param Tag $tag
     * @return JsonResponse
     */
    public function destroy(Tag $tag): JsonResponse
    {
        Gate::authorize('delete', $tag);
        $this->tagService->delete($tag);
        return $this->successResponse();
    }
}