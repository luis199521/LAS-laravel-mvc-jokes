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

    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->user_id; 

    }
    public function delete(User $currentUser, User $user)
    {
        return $currentUser->id === $user->user_id;
    }
}
