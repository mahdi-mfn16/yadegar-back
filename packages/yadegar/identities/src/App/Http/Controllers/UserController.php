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
use Yadegar\Identities\App\Models\User;

/**
 * @group Identity
 * @subgroup User
 */
class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    )
    {}

    /**
     * User list
     *
     */
    public function index(Request $request)
    {
        $users = $this->userService->getUsers();
        return $this->dynamicResponse($users, UserResource::class);
    }

   
    /**
     * User show
     *
     */
    public function show(User $user)
    {
        $user = $this->userService->show($user['id']);
        return $this->successResponse(UserResource::make($user));
    }


    /**
     * User Update
     */
    public function update(UserUpdateRequest $request)
    {
        $user = $this->userService->updateProfile($request);
        return $this->successResponse(UserResource::make($user));
    }


     /**
     * User my Info
     *
     */
    public function getMyInfo()
    {
        $userId = auth('sanctum')->id();
        $user = $this->userService->show($userId);
        return $this->successResponse(UserResource::make($user));
    }



 


}
