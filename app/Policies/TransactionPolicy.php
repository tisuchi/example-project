<?php

namespace App\Policies;

use App\User;
use App\Wallet;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TransactionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Wallet $wallet)
    {
        return $user->id === $wallet->user_id
                    ? Response::allow()
                    : Response::deny('You do not own this wallet.');
    }

    /**
     * Determine whether the user can store the model.
     *
     * @param  \App\User  $user
     * @param  \App\Wallet  $wallet
     * @return mixed
     */
    public function store(User $user, Wallet $wallet)
    {
        return $user->id == $wallet->user_id
                    ? Response::allow()
                    : Response::deny('You do not own this wallet.');
    }
}
