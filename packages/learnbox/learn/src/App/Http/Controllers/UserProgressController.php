<?php

namespace Yadegar\Learn\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Learn\App\Models\UserProgress;
use Yadegar\Learn\App\Models\DTOs\UserProgressDTO;
use Yadegar\Learn\App\Http\Requests\UserProgress\UserProgressIndexRequest;
use Yadegar\Learn\App\Http\Requests\UserProgress\UserProgressStoreRequest;
use Yadegar\Learn\App\Http\Requests\UserProgress\UserProgressUpdateRequest;
use Yadegar\Learn\App\Http\Resources\UserProgressResource;
use Yadegar\Learn\App\Services\UserProgressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

/**
 * @group Yadegar\Learn
 * @subgroup UserProgress
 */
class UserProgressController extends Controller
{
    public function __construct(
        private readonly UserProgressService $userProgressService
    )
    {}


    /**
     * UserProgress Index
     *
     * @param UserProgressIndexRequest $request
     * @return JsonResponse
     */
    public function index(UserProgressIndexRequest $request): JsonResponse
    {
        Gate::authorize('viewAny', [UserProgress::class]);
        $items = $this->userProgressService->index();
        return $this->dynamicResponse($items, UserProgressResource::class);
    }


    /**
     * UserProgress Single
     *
     * @param UserProgress $userProgress
     * @return JsonResponse
     */
    public function show(UserProgress $userProgress): JsonResponse
    {
        Gate::authorize('view', $userProgress);
        $item = $this->userProgressService->show($userProgress->id);
        return $this->dynamicResponse($item, UserProgressResource::class);
    }


    /**
     * UserProgress Store
     *
     * @param UserProgressStoreRequest $request
     * @return JsonResponse
     */
    public function store(UserProgressStoreRequest $request): JsonResponse
    {
        Gate::authorize('create', [UserProgress::class]);
        $item = $this->userProgressService->create(UserProgressDTO::fromRequest($request));
        $item = $this->userProgressService->show($item->id);
        return $this->dynamicResponse($item, UserProgressResource::class);
    }


    /**
     * UserProgress Update
     *
     * @param UserProgressUpdateRequest $request
     * @param UserProgress $userProgress
     * @return JsonResponse
     */
    public function update(UserProgressUpdateRequest $request, UserProgress $userProgress): JsonResponse
    {
        Gate::authorize('update', $userProgress);
        $this->userProgressService->update($userProgress, UserProgressDTO::fromModel($userProgress, $request->all()));
        $item = $this->userProgressService->show($userProgress->id);
        return $this->dynamicResponse($item, UserProgressResource::class);
    }


    /**
     * UserProgress Delete
     *
     * @param UserProgress $userProgress
     * @return JsonResponse
     */
    public function destroy(UserProgress $userProgress): JsonResponse
    {
        Gate::authorize('delete', $userProgress);
        $this->userProgressService->delete($userProgress);
        return $this->successResponse();
    }
}