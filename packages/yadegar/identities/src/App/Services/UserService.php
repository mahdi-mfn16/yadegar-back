<?php

namespace Yadegar\Identities\App\Services;

use App\Helpers\Helper;
use App\Services\Sender\SmsSender;
use Yadegar\Base\App\Services\BaseService;
use Yadegar\Filesystem\App\Facades\Uploader;
use Yadegar\Identities\App\Models\DTOs\UserDTO;
use Yadegar\Identities\App\Repositories\Interfaces\RoleRepositoryInterface;
use Yadegar\Identities\App\Repositories\Interfaces\UserRepositoryInterface;

class UserService extends BaseService
{
    public function __construct(
        UserRepositoryInterface $repository,
        private RoleRepositoryInterface $roleRepo
        )
    {
        parent::__construct($repository);
    }


    public function getUsers()
    {  
        return $this->repository->get();
    }



    public function registerUser($mobile)
    {
        $role = $this->roleRepo->getFilteredOne(['key' => 'user']);
        $user = $this->repository->registerUser($mobile, $role['id']);
        $code = Helper::generateSmsCode();
        // SmsSender::sendSms('authMessage', $mobile, ['token' => $code]);
        
        $this->repository->updateUserCode($mobile, $code);

        return $this->show($user['id']);
    }



    public function sendCode($mobile)
    {
        
        $code = Helper::generateSmsCode();
        // SmsSender::sendSms('authMessage', $mobile, ['token' => $code]);
        
        $this->repository->updateUserCode($mobile, $code);

        return true;
        
    }



    public function checkUserCode($mobile, $code)
    {
        return $this->repository->checkUserCode($mobile, $code);
            
    }



    public function updateProfile($request)
    {
        $user = auth('sanctum')->user();
        $data = $request->all();
        unset($data['mobile']);
        unset($data['role_id']);
        unset($data['code']);
        unset($data['email']);
        unset($data['google_id']);
        
        $data['username'] = isset($data['username']) ? $data['username'] : ($user['username'] ?: Helper::generateUserName($user->id));
        $this->update($user, UserDTO::fromModel($user, $data));

        if ($request->hasFile('avatar')) {
            Uploader::model($user->files->first())
                ->fileable($user)
                ->file($request->file('avatar'))
                ->type('avatar')
                ->dir('user')
                ->alt($user->full_name)
                ->upload();
        }

        return $this->show($user->id);
    }



    // -------- password functions ------


    public function forgetPassword($mobile)
    {
        $user = $this->repository->getUserWithMobile($mobile);
        if(! $user){
            return false;
        }
        $code = Helper::generateSmsCode();
        SmsSender::sendSms('forgetPasswordMessage', $mobile, ['token' => $code]);

        return true;
    }


    public function resetPassword($userId, $password)
    {
        return $this->repository->resetPassword($userId, $password);
    }



    public function changePassword($userId, $oldPassword, $newPassword)
    {
        return $this->repository->changePassword($userId, $oldPassword, $newPassword);
    }
 
}
