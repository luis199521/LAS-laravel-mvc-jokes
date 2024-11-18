<?php

/**
 * Assessment Title: Portfolio Part 3
 * Cluster:          SaaS: Part 1 – Front End Development 
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 *
 * Jokes policy
 *
 * Provides Methods to handle Jokes policy.
 *
 * Filename:        JokePolicy.php
 * Location:        App/Policies
 * Project:         LAS-LARAVEL-MVC-Jokes
 * Date Created:    28/10/2024
 *
 * Author:          Luis Alvarez Suarez <20114831@tafe.wa.edu.au>
 *
 */

namespace App\Policies;

use App\Models\Joke;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JokePolicy
{
    /**
     * Determine which  user can view any jokes.
     */
    public function viewAny(User $user): bool
    {
        $user->can('joke browse');
    }

    /**
     * Determine which user can view jokes.
     */
    public function view(User $user, Joke $joke): bool
    {
        return $user->can('joke read');
    }

    /**
     * Determine which user can create jokes.
     */
    public function create(User $user): bool
    {
        return $user->can('joke add');
    }

    /**
     * Determine which  user can update a joke.
     */
    public function update(User $user, Joke $joke): bool
    {

        if ($user->hasRole('Client')) {
            return $user->id === $joke->author_id;
        }


        return $user->id === $joke->author_id || $user->can('joke edit');
    }


    /**
     * Determine which  user can delete a joke.
     */
    public function delete(User $user, Joke $joke): bool
    {
        if ($user->hasRole('Client')) {
            return $user->id === $joke->author_id;
        }

        if ($user->hasRole('Staff')) {

            return $user->id === $joke->author_id;
        }

        return $user->id === $joke->author_id || $user->can('joke delete');
    }



    /**
     * Determine which  user can restore a joke.
     */
    public function restore(User $user, Joke $joke): bool
    {
        if ($user->hasRole('Client')) {
            return $user->id === $joke->author_id;
        }


        if ($user->hasRole('Staff')) {
            return $joke->author->hasRole('Client') || $joke->author->hasRole('Staff');
        }

        return $user->id === $joke->author_id || $user->can('joke restore');
    }

    /**
     * Determine which  user can permanetly delete a  joke.
     */

    public function forceDelete(User $user, Joke $joke): bool
    {

        if ($user->hasRole('Client')) {
            return $user->id === $joke->author_id;
        }


        if ($user->hasRole('Staff') && $joke->author->hasRole('Client') && $joke->trashed()) {
            return true;
        }

        if ($user->hasRole('Staff') && $joke->author->hasRole('Staff') && $joke->trashed()) {
            return true;
        }

        return $user->id === $joke->author_id || $user->can('joke forceDelete');
    }
}
