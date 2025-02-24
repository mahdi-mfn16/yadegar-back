<?php

namespace Learnbox\Learn\App\Policies;

use Learnbox\Base\App\Helpers\Utility;
use Learnbox\Identities\App\Models\User;
use Learnbox\Learn\App\Models\UserProgress;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserProgressPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  UserProgress  $userProgress
     * @return Response|bool
     */
    public function view(User $user, UserProgress $userProgress)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  UserProgress  $userProgress
     * @return Response|bool
     */
    public function update(User $user, UserProgress  $userProgress)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  UserProgress  $userProgress
     * @return Response|bool
     */
    public function delete(User $user, UserProgress  $userProgress)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  UserProgress  $userProgress
     * @return Response|bool
     */
    public function restore(User $user, UserProgress  $userProgress)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  UserProgress  $userProgress
     * @return Response|bool
     */
    public function forceDelete(User $user, UserProgress  $userProgress)
    {
        //
    }
}