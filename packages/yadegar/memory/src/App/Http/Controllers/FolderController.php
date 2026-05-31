<?php

namespace Yadegar\Memory\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Memory\App\Models\Folder;
use Yadegar\Memory\App\Models\DTOs\FolderDTO;
use Yadegar\Memory\App\Http\Requests\Folder\FolderIndexRequest;
use Yadegar\Memory\App\Http\Requests\Folder\FolderStoreRequest;
use Yadegar\Memory\App\Http\Requests\Folder\FolderUpdateRequest;
use Yadegar\Memory\App\Http\Resources\FolderResource;
use Yadegar\Memory\App\Services\FolderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;
use Yadegar\Memory\App\Services\MemoryService;

/**
 * @group Yadegar\Memory
 * @subgroup Folder
 */
class FolderController extends Controller
{
    public function __construct(
        private readonly FolderService $folderService,
        private readonly MemoryService $memoryService
    )
    {}


    /**
     * Folder Index
     *
     * @param FolderIndexRequest $request
     * @return JsonResponse
     */
    public function index(FolderIndexRequest $request): JsonResponse
    {
        // for Admin
        // Gate::authorize('viewAny', [Folder::class]);
        $items = $this->folderService->index();
        return $this->dynamicResponse($items, FolderResource::class);
    }


    public function getMyFolders(FolderIndexRequest $request): JsonResponse
    {
        $items = $this->folderService->getMyFolderList();
        return $this->dynamicResponse($items, FolderResource::class);
    }


    /**
     * Folder Single
     *
     * @param Folder $folder
     * @return JsonResponse
     */
    public function show(Folder $folder): JsonResponse
    {
        Gate::authorize('view', $folder);
        $item = $this->folderService->show($folder->id);
        return $this->dynamicResponse($item, FolderResource::class);
    }


    /**
     * Folder Store
     *
     * @param FolderStoreRequest $request
     * @return JsonResponse
     */
    public function store(FolderStoreRequest $request): JsonResponse
    {
        // Gate::authorize('create', [Folder::class]);
        $item = $this->folderService->createFolder($request);
        return $this->dynamicResponse($item, FolderResource::class);
    }


    /**
     * Folder Update
     *
     * @param FolderUpdateRequest $request
     * @param Folder $folder
     * @return JsonResponse
     */
    public function update(FolderUpdateRequest $request, Folder $folder): JsonResponse
    {
        Gate::authorize('update', $folder);
        $item = $this->folderService->updateFolder($request, $folder);
        return $this->dynamicResponse($item, FolderResource::class);
    }


    /**
     * Folder Delete
     *
     * @param Folder $folder
     * @return JsonResponse
     */
    public function destroy(Folder $folder): JsonResponse
    {
        Gate::authorize('delete', $folder);
        
        $this->folderService->deleteFolder($folder);
        
        return $this->successResponse();
    }
}