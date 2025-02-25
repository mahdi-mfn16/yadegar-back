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
use Laravel\Socialite\Facades\Socialite;
use Learnbox\Identities\App\Http\Requests\AuthCheckCodeRequest;
use Learnbox\Identities\App\Http\Requests\AuthUserRequest;
use Learnbox\Identities\App\Repositories\Interfaces\RoleRepositoryInterface;
use Learnbox\Identities\App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * @group Identity
 * @subgroup Auth
 */
class AuthController extends Controller
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepo,
        private readonly UserService $userService,
        private RoleRepositoryInterface $roleRepo

    )
    {}


    /**
     * Login with Google
     */
    public function loginGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }


    /**
     * Auth Google Callback
     *
     */
    public function googleAuthCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = $this->userRepo->getFilteredOne(['google_id' => $googleUser->id]);
            $role = $this->roleRepo->getFilteredOne(['key' => 'user']);

            if (!$user) {
                $user = $this->userRepo->create(UserDTO::fromArray([
                    'name' => $googleUser->name,
                    'role_id' => $role['id'],
                    'username' => explode('@',$googleUser->email)[0],
                    'email' => $googleUser->email,
                    'google_id'=> $googleUser->id
                ]));
            }

            $token = $user->createToken('userToken')->plainTextToken;
                
            return $this->successResponse([
                'token' => $token,
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return $this->errorResponse([]);
        }

    }


    /**
     * Auth login
     *
     */
    public function login(AuthUserRequest $request)
    {
        $user = $this->userService->registerUser($request['mobile']);
        return $this->successResponse();
    }



    /**
     * Auth logout
     *
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    }



    /**
     * Auth send auth code
     *
     */
    public function sendCode(AuthUserRequest $request)
    {      
        $this->userService->sendCode($request['mobile']);
        return $this->successResponse();     
    }



    
    /**
     * Auth check auth code
     *
     */
    public function checkUserCode(AuthCheckCodeRequest $request)
    {
        $info = $this->userService->checkUserCode($request['mobile'], $request['code']);

        return $this->successResponse([
            'token' => $info['token'],
            'user' => UserResource::make($info['user'])
        ]);
    }
}
