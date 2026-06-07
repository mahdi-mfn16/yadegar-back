<?php

namespace Yadegar\Identities\App\Services;

use App\Helpers\Helper;
use App\Services\Sender\SmsSender;
use Exception;
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
        
        $this->update($user, UserDTO::fromModel($user, $data));

        if ($request->hasFile('avatar')) {
            Uploader::model($user->files->first())
                ->fileable($user)
                ->file($request->file('avatar'))
                ->type('avatar')
                ->dir('user')
                ->alt($user->name)
                ->upload();
        }

        return $this->show($user->id);
    }


    public function inviteToFamily($user, $request)
    {
        $userId = $user->id;
        $name = $request->input('name');
        $role = $this->roleRepo->getFilteredOne(['key' => 'user']);
        $member = $this->repository->registerUser($request->input('mobile'), $role['id']);

        $text = Helper::generateUniqueString(16);
        $link = "https://yadegar.app/join/{$userId}/{$text}";
        
        $joined = $user->familyMembers()->where('id', $member->id)->first();
        
        if(!$joined){
            $user->familyMembers()->attach($member->id);
            $joined = $user->familyMembers()->where('id', $member->id)->first();      
        }

        $joined->update( $name ? [ 'join_text' => $text, 'name' =>  $name]  : [ 'join_text' => $text ] );

        // SmsSender::sendSms('JoinFamilyMessage', $mobile, ['token' => $link]);

        return $this->show($user['id']);

    }



    public function joinToFamily($user, $request)
    {
        $memberId = $user->id;
        $text = $request->input('text');

        $joined = $user->joinedTo()->where('id', $memberId)->where('join_text', $text)->first();
        if($joined){
            $joined->update([ 'status' => 1, 'join_text' => null ]);
        }else{
            throw new Exception('لینک دعوت اشتباه است', 400);
        }
        return $this->show($user['id']);

    }


    public function removeFromFamily($user, $request)
    {
        $memberId = $request->input('member_id');
        $user->familyMembers()->detach($memberId); 
        
        return $this->show($user['id']);

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
