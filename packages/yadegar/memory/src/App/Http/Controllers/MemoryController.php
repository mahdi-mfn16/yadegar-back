<?php

namespace Yadegar\Memory\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Memory\App\Models\Memory;
use Yadegar\Memory\App\Models\DTOs\MemoryDTO;
use Yadegar\Memory\App\Http\Requests\Memory\MemoryIndexRequest;
use Yadegar\Memory\App\Http\Requests\Memory\MemoryStoreRequest;
use Yadegar\Memory\App\Http\Requests\Memory\MemoryUpdateRequest;
use Yadegar\Memory\App\Http\Resources\MemoryResource;
use Yadegar\Memory\App\Services\MemoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

/**
 * @group Yadegar\Memory
 * @subgroup Memory
 */
class MemoryController extends Controller
{
    public function __construct(
        private readonly MemoryService $memoryService
    )
    {}


    /**
     * Memory Index
     *
     * @param MemoryIndexRequest $request
     * @return JsonResponse
     */
    public function index(MemoryIndexRequest $request)
    {
        // for explore
        // Gate::authorize('viewAny', [Memory::class]);
        $items = $this->memoryService->getExploreList();
        return $this->dynamicResponse($items, MemoryResource::class);
    }


    /**
     * My Memory Index
     *
     * @param MemoryIndexRequest $request
     * @return JsonResponse
     */
    public function getMyMemories(MemoryIndexRequest $request)
    {
        $items = $this->memoryService->getMyMemoryList();
        return $this->dynamicResponse($items, MemoryResource::class);
    }


    /**
     * My Family Memory Index
     *
     * @param MemoryIndexRequest $request
     * @return JsonResponse
     */
    public function getFamilyMemories(MemoryIndexRequest $request)
    {
        $items = $this->memoryService->getFamilyMemoryList();
        info($items);
        return $this->dynamicResponse($items, MemoryResource::class);
    }


    /**
     * Memory Single
     *
     * @param Memory $memory
     * @return JsonResponse
     */
    public function show(Memory $memory)
    {
        $item = $this->memoryService->showMemory($memory);
        // return $this->successResponse(MemoryResource::make($item));
        return $this->dynamicResponse($item, MemoryResource::class);
    }


    /**
     * Memory Store
     *
     * @param MemoryStoreRequest $request
     * @return JsonResponse
     */
    public function store(MemoryStoreRequest $request)
    {
        $item = $this->memoryService->createMemory($request);
        return $this->dynamicResponse($item, MemoryResource::class);
    }


    /**
     * Memory Update
     *
     * @param MemoryUpdateRequest $request
     * @param Memory $memory
     * @return JsonResponse
     */
    public function update(MemoryUpdateRequest $request, Memory $memory)
    {
        Gate::authorize('update', $memory);
        $item = $this->memoryService->updateMemory($request, $memory);
        return $this->dynamicResponse($item, MemoryResource::class);
    }


    /**
     * Memory Delete
     *
     * @param Memory $memory
     * @return JsonResponse
     */
    public function destroy(Memory $memory)
    {
        Gate::authorize('delete', $memory);
        $this->memoryService->delete($memory);
        return $this->successResponse();
    }
}