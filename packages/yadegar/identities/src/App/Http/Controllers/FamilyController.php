<?php

namespace Yadegar\Identities\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Filesystem\App\Facades\Uploader;
use Yadegar\Identities\App\Http\Requests\UserUpdateRequest;
use Yadegar\Identities\App\Http\Resources\UserResource;
use Yadegar\Identities\App\Models\DTOs\UserDTO;
use Yadegar\Identities\App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yadegar\Identities\App\Http\Requests\AuthUserRequest;
use Yadegar\Identities\App\Http\Resources\FamilyResource;
use Yadegar\Identities\App\Models\Family;
use Yadegar\Identities\App\Models\User;

/**
 * @group Identity
 * @subgroup User
 */
class FamilyController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    )
    {}

    /**
     * User list
     *
     */
    public function getUserFamily(Request $request)
    {
        $families = auth('sanctum')->user()->family;
        return $this->dynamicResponse($families, FamilyResource::class);
    }

    /**
     * Update family member name 
     *
     */
    public function updateFamilyMember(Request $request, Family $family)
    {
        $family->update(['name' => $request->input('name')]);
        return $this->successResponse([]);
    }


     /**
     * User my Info
     *
     */
    public function inviteToFamily(AuthUserRequest $request)
    {
        $user = auth('sanctum')->user();
        $user = $this->userService->inviteToFamily($user, $request);
        return $this->successResponse(UserResource::make($user));
    }


    /**
     * User my Info
     *
     */
    public function joinToFamily(Request $request)
    {
        $user = auth('sanctum')->user();
        $user = $this->userService->joinToFamily($user, $request);
        return $this->successResponse(UserResource::make($user));
    }


     /**
     * User my Info
     *
     */
    public function removeFromFamily(Request $request)
    {
        $user = auth('sanctum')->user();
        $user = $this->userService->removeFromFamily($user, $request);
        return $this->successResponse(UserResource::make($user));
    }



 


}
