<?php

namespace GetShitDone\Policies;

use GetShitDone\User;
use GetShitDone\Objective;
use Illuminate\Auth\Access\HandlesAuthorization;

class ObjectivePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the objective.
     *
     * @param  \GetShitDone\User  $user
     * @param  \GetShitDone\Objective  $objective
     * @return mixed
     */
    public function view(User $user, Objective $objective)
    {
        return $user->owns($objective);
    }

    /**
     * Determine whether the user can update the objective.
     *
     * @param  \GetShitDone\User  $user
     * @param  \GetShitDone\Objective  $objective
     * @return mixed
     */
    public function update(User $user, Objective $objective)
    {
        return $user->owns($objective);
    }

    /**
     * Determine whether the user can delete the objective.
     *
     * @param  \GetShitDone\User  $user
     * @param  \GetShitDone\Objective  $objective
     * @return mixed
     */
    public function delete(User $user, Objective $objective)
    {
        return $user->owns($objective);
    }
}
