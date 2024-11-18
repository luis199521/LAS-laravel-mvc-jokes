<?php

namespace App\Policies;

use App\Models\Joke;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JokePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $user->can('joke browse');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Joke $joke): bool
    {
        return $user->can('joke read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('joke add');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Joke $joke): bool
    {

        if ($user->hasRole('Client')) {
            return $user->id === $joke->author_id;
        }


        return $user->id === $joke->author_id || $user->can('joke edit');
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Joke $joke): bool
    {
        if ($user->hasRole('Client')) {
            return $user->id === $joke->author_id;
        }

        if ($user->hasRole('Staff')) { 
            // Permitir que el personal elimine chistes solo si ellos mismos son los creadores 
            return $user->id === $joke->author_id; 
        }

        return $user->id === $joke->author_id || $user->can('joke delete');
    }



    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Joke $joke): bool
    {
        if ($user->hasRole('Client')) {
            return $user->id === $joke->author_id;
        }


        // El personal puede restaurar cualquier chiste de clientes o de otros miembros del personal 
        if ($user->hasRole('Staff')) {
            return $joke->author->hasRole('Client') || $joke->author->hasRole('Staff');
        }

        return $user->id === $joke->author_id || $user->can('joke restore');
    }

    public function forceDelete(User $user, Joke $joke): bool
    {
        // Los clientes pueden eliminar permanentemente sus propios chistes eliminados
        if ($user->hasRole('Client')) {
            return $user->id === $joke->author_id;
        }
    
        // El personal puede eliminar permanentemente cualquier chiste eliminado por clientes
        if ($user->hasRole('Staff') && $joke->author->hasRole('Client') && $joke->trashed()) {
            return true;
        }
    
        // El personal puede eliminar permanentemente cualquier chiste eliminado por otros miembros del personal
        if ($user->hasRole('Staff') && $joke->author->hasRole('Staff') && $joke->trashed()) {
            return true;
        }
    
        // Los usuarios con el permiso 'joke forceDelete' también pueden eliminar chistes
        return $user->id === $joke->author_id || $user->can('joke forceDelete');
    }
    
}
