<?php

namespace Yadegar\Memory\App\Policies;

use Yadegar\Base\App\Helpers\Utility;
use Yadegar\Identities\App\Models\User;
use Yadegar\Memory\App\Models\Memory;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class MemoryPolicy
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
     * @param  Memory  $memory
     * @return Response|bool
     */
    public function view(User $user, Memory $memory)
    {
        return $user->id === $memory->user_id
        ? Response::allow()
        : Response::deny(Utility::getAuthorizeMessage('view', 'memory'));
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
     * @param  Memory  $memory
     * @return Response|bool
     */
    public function update(User $user, Memory  $memory)
    {
        return $user->id === $memory->user_id
        ? Response::allow()
        : Response::deny(Utility::getAuthorizeMessage('update', 'memory'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Memory  $memory
     * @return Response|bool
     */
    public function delete(User $user, Memory  $memory)
    {
        return $user->id === $memory->user_id
        ? Response::allow()
        : Response::deny(Utility::getAuthorizeMessage('delete', 'memory'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Memory  $memory
     * @return Response|bool
     */
    public function restore(User $user, Memory  $memory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Memory  $memory
     * @return Response|bool
     */
    public function forceDelete(User $user, Memory  $memory)
    {
        //
    }
}