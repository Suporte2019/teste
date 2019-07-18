<?php

namespace App\Listeners\Empresa;

use App\Models\wsim\ACL\Role;
use DB;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function onUserLogin($event)
    {
         


            // Registra o acesso do usuário quando fazer LOGIN;
         // auth()->user()->registra_log_acesso_login();


        // Recupera usuário autenticado;
        $user = auth()->user();

       
        //--Recupera as roles do usuário autenticado retorna uma collection--//
        $roles = $user->roles()->get();

        //--Recupera as permissoẽs do usuário autenticado//
        $permissions = [];
        
          foreach ($roles as $role) {
            
           foreach ($role->permissions as $permission) {
            $permissions[] = $permission->nome;
            
           }
         }

            //--Recupera as roles do usuário autenticado--//
            $rolesNome = [];
    
          foreach ($roles as $role) {  
           $rolesNome[] = $role->nome;
         }
 
        //--Cria session de roles e ermission do usuário autenticado--//
         session([
            'roles' => $rolesNome,
            'permissions' => $permissions,
            //'tenan' => $tenan,
        ]);

    }
 
    /**
     * Handle user logout events.
     */
    public function onUserLogout($event)
    {
        
        // Registra o acesso do usuário quando fazer LOGOUT;
        //auth()->user()->registra_log_acesso_logout();
        
    }
 
 
    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\Empresa\UserEventSubscriber@onUserLogin'
        );
 
        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\Empresa\UserEventSubscriber@onUserLogout'
        );
    }
 
}