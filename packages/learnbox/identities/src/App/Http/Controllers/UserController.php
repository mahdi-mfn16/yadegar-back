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


     /**
      * forget password 
      */
     public function forgetPassword(Request $request)
     {
         
         // $user = $this->userService->forgetPassword($request['mobile']);
 
         // if(! $user){
         //     $this->errorResponse([], 'user with this mobile number doesnt exist');
         // }
         // return $this->successJsonResponse();
     }
 
 
     /**
      * reset password 
      *
      */
     public function resetPassword(Request $request)
     {
         // $userId = auth('sanctum')->id();
         // $this->userService->resetPassword($userId, $request['password']);
         // return $this->successJsonResponse();
     }
 
 
 
     /**
      * change password 
      *
      */
     public function changePassword(Request $request)
     {
         // $userId = auth('sanctum')->id();
         // $this->userService->changePassword($userId, $request['old_password'], $request['new_password']);
         // return $this->successJsonResponse();
     }
 
 
 
     /**
      * delete user temporarily 
      *
      */
     public function temporaryDeleteUser(User $user)
     {
         // $this->userService->deleteItem($user['id']);
         // return $this->successJsonResponse();
     }
 
 
 
     /**
      * delete user permanently 
      *
      */
     public function permanentDeleteUser(User $user)
     {
         // $this->userService->deleteItem($user['id']);
         // return $this->successJsonResponse();
     }
}
