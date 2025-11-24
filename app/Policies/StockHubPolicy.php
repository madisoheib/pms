<?php

namespace App\Policies;

use App\Models\StockHub;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StockHubPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view stock_hubs');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StockHub $stockHub): bool
    {
        return $user->can('view stock_hubs');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create stock_hubs');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StockHub $stockHub): bool
    {
        return $user->can('edit stock_hubs');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StockHub $stockHub): bool
    {
        return $user->can('delete stock_hubs');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StockHub $stockHub): bool
    {
        return $user->can('edit stock_hubs');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StockHub $stockHub): bool
    {
        return $user->can('delete stock_hubs');
    }
}
