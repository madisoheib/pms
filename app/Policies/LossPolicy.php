<?php

namespace App\Policies;

use App\Models\Loss;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LossPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view losses');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Loss $loss): bool
    {
        return $user->can('view losses');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create losses');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Loss $loss): bool
    {
        return $user->can('edit losses');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Loss $loss): bool
    {
        return $user->can('delete losses');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Loss $loss): bool
    {
        return $user->can('edit losses');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Loss $loss): bool
    {
        return $user->can('delete losses');
    }
}
