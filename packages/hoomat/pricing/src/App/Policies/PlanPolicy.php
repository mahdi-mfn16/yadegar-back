<?php

namespace Hoomat\Pricing\App\Policies;

use Hoomat\Base\App\Helpers\Utility;
use Hoomat\Identities\App\Models\User;
use Hoomat\Pricing\App\Models\Plan;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PlanPolicy
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
     * @param  Plan  $plan
     * @return Response|bool
     */
    public function view(User $user, Plan $plan)
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
     * @param  Plan  $plan
     * @return Response|bool
     */
    public function update(User $user, Plan  $plan)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Plan  $plan
     * @return Response|bool
     */
    public function delete(User $user, Plan  $plan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Plan  $plan
     * @return Response|bool
     */
    public function restore(User $user, Plan  $plan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Plan  $plan
     * @return Response|bool
     */
    public function forceDelete(User $user, Plan  $plan)
    {
        //
    }
}