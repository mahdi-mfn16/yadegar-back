<?php

namespace Learnbox\Identities\App\Services;

use App\Helpers\Helper;
use App\Services\Sender\SmsSender;
use Learnbox\Base\App\Services\BaseService;
use Learnbox\Identities\App\Models\DTOs\UserDTO;
use Learnbox\Identities\App\Repositories\Interfaces\RoleRepositoryInterface;
use Learnbox\Identities\App\Repositories\Interfaces\UserRepositoryInterface;

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
        SmsSender::sendSms('authMessage', $mobile, ['token' => $code]);
        
        $this->repository->updateUserCode($mobile, $code);

        return $user;
    }



    public function sendCode($mobile)
    {
        
        $code = Helper::generateSmsCode();
        SmsSender::sendSms('authMessage', $mobile, ['token' => $code]);
        
        $this->repository->updateUserCode($mobile, $code);

        return true;
        
    }



    public function checkUserCode($mobile, $code)
    {
        return $this->repository->checkUserCode($mobile, $code);
            
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
