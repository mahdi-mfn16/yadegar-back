<?php

namespace Learnbox\Content\App\Policies;

use Learnbox\Base\App\Helpers\Utility;
use Learnbox\Identities\App\Models\User;
use Learnbox\Content\App\Models\UserCard;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserCardPolicy
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
     * @param  UserCard  $userCard
     * @return Response|bool
     */
    public function view(User $user, UserCard $userCard)
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
     * @param  UserCard  $userCard
     * @return Response|bool
     */
    public function update(User $user, UserCard  $userCard)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  UserCard  $userCard
     * @return Response|bool
     */
    public function delete(User $user, UserCard  $userCard)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  UserCard  $userCard
     * @return Response|bool
     */
    public function restore(User $user, UserCard  $userCard)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  UserCard  $userCard
     * @return Response|bool
     */
    public function forceDelete(User $user, UserCard  $userCard)
    {
        //
    }
}