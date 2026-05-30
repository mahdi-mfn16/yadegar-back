<?php

namespace Yadegar\Identities\App\Repositories;

use App\Helpers\Helper;
use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Identities\App\Models\User;
use Yadegar\Identities\App\Repositories\Interfaces\UserRepositoryInterface;
use Yadegar\Identities\App\Scopes\User\UserFilterScope;
use Yadegar\Identities\App\Scopes\User\UserLoadScope;
use Yadegar\Identities\App\Scopes\User\UserSearchScope;
use Yadegar\Identities\App\Scopes\User\UserSortScope;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(
        User $model,
        UserFilterScope $filterScope,
        UserSortScope $sortScope,
        UserSearchScope $searchScope,
        UserLoadScope $loadScope
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }


    public function load()
    {
        return [
            
        ];
    }


    public function registerUser($mobile, $roleId)
    {
        $user = $this->model->updateOrCreate([
            'mobile' => $mobile,
            'role_id'=> $roleId,
        ]);
        
        $user->update([
            'username' => Helper::generateUserName($user->id),
        ]);
        return $user;
    }



    public function updateUserCode($mobile, $code)
    {
        return $this->model->where('mobile', $mobile)->update([
            'code' => $code
        ]);
    }



    public function checkUserCode($mobile, $code)
    {
        
        
        // back door
        if($code == '123456'){
            $user = $this->model->where('mobile', $mobile)->first();
        }else{
            $user = $this->model->where('mobile', $mobile)->where('code', $code)->first();
        }

        $token = null;
        if($user){
            $token = $user->createToken('token-name')->plainTextToken;
            $user->update([
                'code' => null
            ]);
        }
       

        return ['user' => $user, 'token' => $token];
    }


    public function getUserWithMobile($mobile)
    {
        return $this->model->where('mobile', $mobile)->first();
    }

    public function getUserWithEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }


    public function isMobileUnique($mobile)
    {
       $user = $this->getUserWithMobile($mobile);
       return $user ? false : true;
    }


    public function isEmailUnique($email)
    {
       $user = $this->getUserWithEmail($email);
       return $user ? false : true;
    }



    public function resetPassword($userId, $password)
    { 
        return $this->model->where('id', $userId)->update([
            'password' => bcrypt($password),
            'code' => null,
        ]);
    }


    public function changePassword($userId, $oldPassword, $newPassword)
    {
        $authUser = $this->model->where('id', $userId)->first();
        if(!password_verify($oldPassword, $authUser['password'])){
            return false;
        }

        $authUser->update([
            'password' => bcrypt($newPassword)
        ]);

        return true;
    }



}
