<?php

namespace Learnbox\Content\App\Http\Controllers;

use Learnbox\Base\App\Http\Controllers\Controller;
use Learnbox\Content\App\Models\UserCollection;
use Learnbox\Content\App\Models\DTOs\UserCollectionDTO;
use Learnbox\Content\App\Http\Requests\UserCollection\UserCollectionIndexRequest;
use Learnbox\Content\App\Http\Requests\UserCollection\UserCollectionStoreRequest;
use Learnbox\Content\App\Http\Requests\UserCollection\UserCollectionUpdateRequest;
use Learnbox\Content\App\Http\Resources\UserCollectionResource;
use Learnbox\Content\App\Services\UserCollectionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

/**
 * @group Learnbox\Content
 * @subgroup UserCollection
 */
class UserCollectionController extends Controller
{
    public function __construct(
        private readonly UserCollectionService $userCollectionService
    )
    {}


    /**
     * UserCollection Index
     *
     * @param UserCollectionIndexRequest $request
     * @return JsonResponse
     */
    public function index(UserCollectionIndexRequest $request): JsonResponse
    {
        Gate::authorize('viewAny', [UserCollection::class]);
        $items = $this->userCollectionService->index();
        return $this->dynamicResponse($items, UserCollectionResource::class);
    }


    /**
     * UserCollection Single
     *
     * @param UserCollection $userCollection
     * @return JsonResponse
     */
    public function show(UserCollection $userCollection): JsonResponse
    {
        Gate::authorize('view', $userCollection);
        $item = $this->userCollectionService->show($userCollection->id);
        return $this->dynamicResponse($item, UserCollectionResource::class);
    }


    /**
     * UserCollection Store
     *
     * @param UserCollectionStoreRequest $request
     * @return JsonResponse
     */
    public function store(UserCollectionStoreRequest $request): JsonResponse
    {
        Gate::authorize('create', [UserCollection::class]);
        $item = $this->userCollectionService->create(UserCollectionDTO::fromRequest($request));
        $item = $this->userCollectionService->show($item->id);
        return $this->dynamicResponse($item, UserCollectionResource::class);
    }


    /**
     * UserCollection Update
     *
     * @param UserCollectionUpdateRequest $request
     * @param UserCollection $userCollection
     * @return JsonResponse
     */
    public function update(UserCollectionUpdateRequest $request, UserCollection $userCollection): JsonResponse
    {
        Gate::authorize('update', $userCollection);
        $this->userCollectionService->update($userCollection, UserCollectionDTO::fromModel($userCollection, $request->all()));
        $item = $this->userCollectionService->show($userCollection->id);
        return $this->dynamicResponse($item, UserCollectionResource::class);
    }


    /**
     * UserCollection Delete
     *
     * @param UserCollection $userCollection
     * @return JsonResponse
     */
    public function destroy(UserCollection $userCollection): JsonResponse
    {
        Gate::authorize('delete', $userCollection);
        $this->userCollectionService->delete($userCollection);
        return $this->successResponse();
    }
}