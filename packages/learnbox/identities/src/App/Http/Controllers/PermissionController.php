<?php

namespace Learnbox\Identities\App\Http\Controllers;

use Learnbox\Base\App\Http\Controllers\Controller;
use Learnbox\Base\App\Http\Requests\ServiceRequiredRequest;
use Learnbox\Identities\App\Http\Resources\PermissionResource;
use Learnbox\Identities\App\Services\PermissionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Identity
 * @subgroup Permission
 */
class PermissionController extends Controller
{
    public function __construct(
        private readonly PermissionService $permissionService
    )
    {}


    /**
     * Permission Index
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $permissions = $this->permissionService->index();
        return $this->dynamicResponse($permissions, PermissionResource::class);
    }
}
