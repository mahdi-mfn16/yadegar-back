<?php

namespace Learnbox\Learn\App\Policies;

use Learnbox\Base\App\Helpers\Utility;
use Learnbox\Identities\App\Models\User;
use Learnbox\Learn\App\Models\Box;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BoxPolicy
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
     * @param  Box  $box
     * @return Response|bool
     */
    public function view(User $user, Box $box)
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
     * @param  Box  $box
     * @return Response|bool
     */
    public function update(User $user, Box  $box)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Box  $box
     * @return Response|bool
     */
    public function delete(User $user, Box  $box)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Box  $box
     * @return Response|bool
     */
    public function restore(User $user, Box  $box)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Box  $box
     * @return Response|bool
     */
    public function forceDelete(User $user, Box  $box)
    {
        //
    }
}