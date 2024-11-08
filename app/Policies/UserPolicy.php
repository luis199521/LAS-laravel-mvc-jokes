<?php

namespace App\Policies;
use Spatie\Permission\Models\Role;
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
        return $user->can('user browse');
    }

    public function view(User $currentUser, User $user): bool
    {
        return $currentUser->id === $user->user_id || $currentUser->id === $user->id && $currentUser->can('user read');
    }

    public function create(User $currentUser, User $user): bool
    {
        if ($currentUser->hasRole('Superuser')) {
            return true;
        }
    
        $newUserRole = request()->input('role'); 
    
        if ($currentUser->hasRole('Administrator') && $newUserRole === 'Administrator') {
            return false; 
        }

        if ($newUserRole === 'Superuser')
         { 
            return false;
         } 

        
        return $currentUser->can('user add');
    }
    
    public function update(User $currentUser, User $user): bool
    {

        if ($currentUser->hasRole('Superuser')) {
            return true;
        }
      
    
        if ($currentUser->hasRole('Administrator') && $user->hasRole('Administrator')) {
            return false;
        }
    
        return $currentUser->can('user edit');
    }
    
    public function delete(User $currentUser, User $user): bool
    {
        if ($currentUser->hasRole('Superuser')) {
            return true;
        }
    
        if ($currentUser->hasRole('Administrator') && $user->hasRole('Administrator')) {
            return false;
        }
    
        return $currentUser->can('user delete');
    }
    
}
