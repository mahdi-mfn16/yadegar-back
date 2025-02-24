<?php

namespace Learnbox\Identities\App\Http\Controllers;

use Learnbox\Base\App\Http\Controllers\Controller;
use Learnbox\Filesystem\App\Facades\Uploader;
use Learnbox\Identities\App\Http\Requests\UserUpdateRequest;
use Learnbox\Identities\App\Http\Resources\UserResource;
use Learnbox\Identities\App\Models\DTOs\UserDTO;
use Learnbox\Identities\App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Learnbox\Identities\App\Models\User;

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
        $user = $this->userService->getUsers();
        return $this->successJsonResponse(UserResource::make($user));
    }

   
    /**
     * User show
     *
     */
    public function show(User $user)
    {
        $user = $this->userService->show($user['id']);
        return $this->successJsonResponse(UserResource::make($user));
    }


    /**
     * User Update
     */
    public function update(UserUpdateRequest $request)
    {
        $user = auth('sanctum')->user();
        $data = $request->all();
        unset($data['role_id']);
        $this->userService->update($user, UserDTO::fromModel($user, $data));

        if ($request->hasFile('avatar')) {
            Uploader::model($user->files->first())
                ->fileable($user)
                ->file($request->file('avatar'))
                ->type('avatar')
                ->dir('user')
                ->name($user->full_name)
                ->upload();
        }

        return $this->dynamicResponse(
            $this->userService->show($user->id),
            UserResource::class
        );
    }


     /**
     * User my Info
     *
     */
    public function getMyInfo()
    {
        $userId = auth('sanctum')->id();
        $user = $this->userService->show($userId);
        return $this->successJsonResponse(UserResource::make($user));
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
