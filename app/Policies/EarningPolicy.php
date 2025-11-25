<?php

namespace App\Policies;

use App\Models\Earning;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EarningPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Allow any authenticated user to view earnings (financial reports)
        // Earnings are read-only auto-generated records from sales
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Earning $earning): bool
    {
        // Allow any authenticated user to view earnings (financial reports)
        // Earnings are read-only auto-generated records from sales
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Earnings are auto-generated from sales, not manually created
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Earning $earning): bool
    {
        // Earnings should not be edited
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Earning $earning): bool
    {
        // Earnings should not be deleted
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Earning $earning): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Earning $earning): bool
    {
        return false;
    }
}