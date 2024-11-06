<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function viewAny(User $user): bool
    {
       //
    }

    public function view(User $currentUser, User $user): bool
    {
        return $currentUser->id === $user->user_id || $currentUser->id === $user->id;
    }

    public function create(User $user): bool
    {
        //
    }




    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->user_id || $currentUser->id === $user->id;
    }

    public function delete(User $currentUser, User $user)
    {
        return $currentUser->id === $user->user_id || $currentUser->id === $user->id;
    }
}
