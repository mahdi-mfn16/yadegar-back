<?php

namespace Yadegar\Identities\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Base\App\Http\Requests\ServiceRequiredRequest;
use Yadegar\Identities\App\Http\Requests\RoleStoreRequest;
use Yadegar\Identities\App\Http\Resources\RoleResource;
use Yadegar\Identities\App\Models\DTOs\RoleDTO;
use Yadegar\Identities\App\Models\Role;
use Yadegar\Identities\App\Services\RoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yadegar\Identities\App\Http\Requests\RoleUpdateRequest;

/**
 * @group Identity
 * @subgroup Role
 */
class RoleController extends Controller
{
    public function __construct(
        private readonly RoleService $roleService
    )
    {}


    /**
     * Role Index
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $roles = $this->roleService->index();
        return $this->dynamicResponse($roles, RoleResource::class);
    }


    /**
     * Role Store
     *
     * @param RoleStoreRequest $request
     * @return JsonResponse
     */
    public function store(RoleStoreRequest $request): JsonResponse
    {
        $permissions = $request->input('permissions');

        $role = $this->roleService->createNewRole(RoleDTO::fromRequest($request), $permissions);
        $role = $this->roleService->show($role->id);
        return $this->dynamicResponse($role, RoleResource::class);
    }


    /**
     * Role Update
     *
     * @param RoleUpdateRequest $request
     * @param Role             $role
     * @return JsonResponse
     */
    public function update(RoleUpdateRequest $request, Role $role): JsonResponse
    {
        $permissions = $request->input('permissions');

        $this->roleService->updateRole($role, RoleDTO::fromModel($role, $request->all()), $permissions);
        $role = $this->roleService->show($role->id);
        return $this->dynamicResponse($role, RoleResource::class);
    }
}
