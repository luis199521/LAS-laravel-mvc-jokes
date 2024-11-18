<?php

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


    public function viewAny(User $currentUser): bool
    {

       // Permitir si el usuario es Superuser o Administrador 
       if ($currentUser->hasRole(['Superuser', 'Administrator']))
        { 
            return true; 
        }

        if ($currentUser->hasRole('Staff')) {
            return true;
        }


        return $currentUser->can('user browse');
    }


    public function view(User $currentUser, User $user): bool
    {
        if ($currentUser->hasRole('Superuser'))
         { 
            return true;
         }

         if ($currentUser->hasRole('Administrator')) {
            return true;
        }


        return $currentUser->id === $user->user_id || ($currentUser->can('user read') && $currentUser->hasRole('Staff'));
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

        if ($currentUser->hasRole('Staff') && $newUserRole !== 'Client') {
            return false;
        }

        if ($newUserRole === 'Superuser') {
            return false;
        }


        return $currentUser->can('user add');
    }

    public function update(User $currentUser, User $user): bool
    {
        // Los superusuarios no pueden eliminar sus propias cuentas
        if ($currentUser->hasRole('Superuser')) {
            return $currentUser->id !== $user->id;
        }
    
        // Los administradores no pueden eliminar a otros administradores
        if ($currentUser->hasRole('Administrator') && $user->hasRole('Administrator')) {
            return false;
        }
    
        // Los miembros del personal no pueden actualizar a otros miembros del personal, administradores o superusuarios
        if ($currentUser->hasRole('Staff') && $user->hasRole(['Staff', 'Administrator', 'Superuser'])) {
            return false;
        }
    
        // Permitir actualización si el usuario tiene el permiso 'user edit'
        return $currentUser->can('user edit');
    }
    

    public function delete(User $currentUser, User $user): bool
    {
        // Los Superusuarios no pueden eliminar sus propias cuentas
        if ($currentUser->hasRole('Superuser') && $currentUser->id === $user->id) {
            return false;
        }
    
        // Los Superusuarios pueden eliminar cualquier otra cuenta
        if ($currentUser->hasRole('Superuser')) {
            return true;
        }
    
        // Los Administradores no pueden eliminar a otros Administradores
        if ($currentUser->hasRole('Administrator') && $user->hasRole('Administrator')) {
            return false;
        }
    
        // Los miembros del personal no pueden eliminar a otros miembros del personal, administradores o superusuarios
        if ($currentUser->hasRole('Staff') && $user->hasRole(['Staff', 'Administrator', 'Superuser'])) {
            return false;
        }
    
        // Permitir eliminación si el usuario tiene el permiso 'user delete'
        return $currentUser->can('user delete');
    }
    

    public function forceDelete(User $currentUser, User $user): bool
    {
        // Los Superusuarios pueden eliminar cualquier cuenta
        if ($currentUser->hasRole('Superuser')) {
            return true;
        }

        // Los Administradores no pueden eliminar a otros Administradores
        if ($currentUser->hasRole('Administrator') && $user->hasRole('Administrator')) {
            return false;
        }

        // Un administrador puede eliminar permanentemente cualquier cuenta de personal eliminada por administradores
        if ($currentUser->hasRole('Administrator') && $user->trashed() && $user->hasRole('Staff')) {
            return true;
        }

        // Los miembros del personal no pueden eliminar permanentemente a otros miembros del personal, administradores o superusuarios
        if ($currentUser->hasRole('Staff') && $user->hasRole(['Staff', 'Administrator', 'Superuser'])) {
            return false;
        }

        // Permitir eliminación permanente si el usuario tiene el permiso 'user forceDelete'
        return $currentUser->can('user forceDelete');
    }



    public function restore(User $user, User $model): bool
    {
        // El personal puede restaurar cuentas de clientes
        if ($user->hasRole('Staff')) {
            return $model->hasRole('Client');
        }
    
        // Los administradores pueden restaurar cualquier cuenta de cliente eliminada por otro administrador
        if ($user->hasRole('Administrator') && $model->trashed() && $model->hasRole('Client')) {
            return true;
        }
    
        return $user->can('user restore');
    }
    



}
