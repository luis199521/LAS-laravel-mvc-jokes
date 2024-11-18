<?php

/**
 * Assessment Title: Portfolio Part 3
 * Cluster:          SaaS: Part 1 – Front End Development 
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 *
 * Users policy
 *
 * Provides Methods to handle users policy.
 *
 * Filename:        Usersolicy.php
 * Location:        App/Policies
 * Project:         LAS-LARAVEL-MVC-Jokes
 * Date Created:    28/10/2024
 *
 * Author:          Luis Alvarez Suarez <20114831@tafe.wa.edu.au>
 *
 */

namespace App\Policies;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{

    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine which  user can view any user.
     */
    public function viewAny(User $currentUser): bool
    {


        if ($currentUser->hasRole(['Superuser', 'Administrator'])) {
            return true;
        }

        if ($currentUser->hasRole('Staff')) {
            return true;
        }


        return $currentUser->can('user browse');
    }

    /**
     * Determine which user can view a user.
     */
    public function view(User $currentUser, User $user): bool
    {
        if ($currentUser->hasRole('Superuser')) {
            return true;
        }

        if ($currentUser->hasRole('Administrator')) {
            return true;
        }


        return $currentUser->id === $user->user_id || ($currentUser->can('user read') && $currentUser->hasRole('Staff'));
    }


    /**
     * Determine which user can create a user.
     */
    public function create(User $currentUser, User $user): bool
    {
        if ($currentUser->hasRole('Superuser')) {
            return true;
        }

        $newUserRole = request()->input('role');

        if ($currentUser->hasRole('Administrator') && $newUserRole === 'Administrator') {
            return false;
        }

        if ($currentUser->hasRole('Staff') && $newUserRole !== 'Client') {
            return false;
        }

        if ($newUserRole === 'Superuser') {
            return false;
        }


        return $currentUser->can('user add');
    }

    /**
     * Determine which  user can update a user.
     */
    public function update(User $currentUser, User $user): bool
    {

        if ($currentUser->hasRole('Superuser')) {
            return $currentUser->id !== $user->id;
        }


        if ($currentUser->hasRole('Administrator') && $user->hasRole('Administrator')) {
            return false;
        }


        if ($currentUser->hasRole('Staff') && $user->hasRole(['Staff', 'Administrator', 'Superuser'])) {
            return false;
        }


        return $currentUser->can('user edit');
    }

    /**
     * Determine which  user can delete a user.
     */
    public function delete(User $currentUser, User $user): bool
    {

        if ($currentUser->hasRole('Superuser') && $currentUser->id === $user->id) {
            return false;
        }


        if ($currentUser->hasRole('Superuser')) {
            return true;
        }


        if ($currentUser->hasRole('Administrator') && $user->hasRole('Administrator')) {
            return false;
        }


        if ($currentUser->hasRole('Staff') && $user->hasRole(['Staff', 'Administrator', 'Superuser'])) {
            return false;
        }


        return $currentUser->can('user delete');
    }

    /**
     * Determine which  user can permanetly delete a  user.
     */

    public function forceDelete(User $currentUser, User $user): bool
    {

        if ($currentUser->hasRole('Superuser')) {
            return true;
        }


        if ($currentUser->hasRole('Administrator') && $user->hasRole('Administrator')) {
            return false;
        }


        if ($currentUser->hasRole('Administrator') && $user->trashed() && $user->hasRole('Staff')) {
            return true;
        }


        if ($currentUser->hasRole('Staff') && $user->hasRole(['Staff', 'Administrator', 'Superuser'])) {
            return false;
        }

        return $currentUser->can('user forceDelete');
    }

    /**
     * Determine which  user can restore a user.
     */

    public function restore(User $user, User $model): bool
    {

        if ($user->hasRole('Staff')) {
            return $model->hasRole('Client');
        }


        if ($user->hasRole('Administrator') && $model->trashed() && $model->hasRole('Client')) {
            return true;
        }

        return $user->can('user restore');
    }
}
