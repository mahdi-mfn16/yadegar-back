<?php

namespace Learnbox\Content\App\Http\Controllers;

use Learnbox\Base\App\Http\Controllers\Controller;
use Learnbox\Content\App\Models\UserCard;
use Learnbox\Content\App\Models\DTOs\UserCardDTO;
use Learnbox\Content\App\Http\Requests\UserCard\UserCardIndexRequest;
use Learnbox\Content\App\Http\Requests\UserCard\UserCardStoreRequest;
use Learnbox\Content\App\Http\Requests\UserCard\UserCardUpdateRequest;
use Learnbox\Content\App\Http\Resources\UserCardResource;
use Learnbox\Content\App\Services\UserCardService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

/**
 * @group Learnbox\Content
 * @subgroup UserCard
 */
class UserCardController extends Controller
{
    public function __construct(
        private readonly UserCardService $userCardService
    )
    {}


    /**
     * UserCard Index
     *
     * @param UserCardIndexRequest $request
     * @return JsonResponse
     */
    public function index(UserCardIndexRequest $request): JsonResponse
    {
        Gate::authorize('viewAny', [UserCard::class]);
        $items = $this->userCardService->index();
        return $this->dynamicResponse($items, UserCardResource::class);
    }


    /**
     * UserCard Single
     *
     * @param UserCard $userCard
     * @return JsonResponse
     */
    public function show(UserCard $userCard): JsonResponse
    {
        Gate::authorize('view', $userCard);
        $item = $this->userCardService->show($userCard->id);
        return $this->dynamicResponse($item, UserCardResource::class);
    }


    /**
     * UserCard Store
     *
     * @param UserCardStoreRequest $request
     * @return JsonResponse
     */
    public function store(UserCardStoreRequest $request): JsonResponse
    {
        Gate::authorize('create', [UserCard::class]);
        $item = $this->userCardService->create(UserCardDTO::fromRequest($request));
        $item = $this->userCardService->show($item->id);
        return $this->dynamicResponse($item, UserCardResource::class);
    }


    /**
     * UserCard Update
     *
     * @param UserCardUpdateRequest $request
     * @param UserCard $userCard
     * @return JsonResponse
     */
    public function update(UserCardUpdateRequest $request, UserCard $userCard): JsonResponse
    {
        Gate::authorize('update', $userCard);
        $this->userCardService->update($userCard, UserCardDTO::fromModel($userCard, $request->all()));
        $item = $this->userCardService->show($userCard->id);
        return $this->dynamicResponse($item, UserCardResource::class);
    }


    /**
     * UserCard Delete
     *
     * @param UserCard $userCard
     * @return JsonResponse
     */
    public function destroy(UserCard $userCard): JsonResponse
    {
        Gate::authorize('delete', $userCard);
        $this->userCardService->delete($userCard);
        return $this->successResponse();
    }
}