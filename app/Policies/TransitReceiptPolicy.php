<?php

namespace App\Policies;

use App\Models\TransitReceipt;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TransitReceiptPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view transit_receipts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TransitReceipt $transitReceipt): bool
    {
        return $user->can('view transit_receipts');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create transit_receipts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TransitReceipt $transitReceipt): bool
    {
        return $user->can('edit transit_receipts');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TransitReceipt $transitReceipt): bool
    {
        return $user->can('delete transit_receipts');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TransitReceipt $transitReceipt): bool
    {
        return $user->can('edit transit_receipts');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TransitReceipt $transitReceipt): bool
    {
        return $user->can('delete transit_receipts');
    }
}
