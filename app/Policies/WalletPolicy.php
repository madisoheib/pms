<?php

namespace App\Policies;

use App\Models\Wallet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class WalletPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view wallets');
    }

    public function view(User $user, Wallet $wallet): bool
    {
        return $user->can('view wallets');
    }

    public function create(User $user): bool
    {
        return $user->can('create wallets');
    }

    public function update(User $user, Wallet $wallet): bool
    {
        return $user->can('edit wallets');
    }

    public function delete(User $user, Wallet $wallet): bool
    {
        return $user->can('delete wallets');
    }

    public function restore(User $user, Wallet $wallet): bool
    {
        return $user->can('edit wallets');
    }

    public function forceDelete(User $user, Wallet $wallet): bool
    {
        return $user->can('delete wallets');
    }
}
