<?php

namespace Yadegar\Tag\App\Policies;

use Yadegar\Base\App\Helpers\Utility;
use Yadegar\Identities\App\Models\User;
use Yadegar\Tag\App\Models\Taggable;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TaggablePolicy
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
     * @param  Taggable  $taggable
     * @return Response|bool
     */
    public function view(User $user, Taggable $taggable)
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
     * @param  Taggable  $taggable
     * @return Response|bool
     */
    public function update(User $user, Taggable  $taggable)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Taggable  $taggable
     * @return Response|bool
     */
    public function delete(User $user, Taggable  $taggable)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Taggable  $taggable
     * @return Response|bool
     */
    public function restore(User $user, Taggable  $taggable)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Taggable  $taggable
     * @return Response|bool
     */
    public function forceDelete(User $user, Taggable  $taggable)
    {
        //
    }
}