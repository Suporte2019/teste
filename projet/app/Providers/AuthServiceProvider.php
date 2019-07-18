<?php

namespace App\Providers;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\wsim\ACL\Permission;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
     /**
      * The policy mappings for the application.
      *
      * @var array
      */
     protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',

     ];

     /**
      * Register any authentication / authorization services.
      *
      * @return void
      */
     public function boot()
     {
      $this->registerPolicies();

      //Recupera todas as permissões com suas roles (grupos) //
      $permissions = permission::with('roles')->get();
      
      //Percorre as permissões//    
      foreach ($permissions as $permission)
      {

        Gate::define($permission->nome, function (User $user) use ($permission){

       //recupera usuário logado ($user) e verifica a permissao método hasPermission//
         return $user->hasPermission($permission);
         dd($permission->nome);

       });
      }

      //before primeiro GATE a ser verificado - Grupo-Super Acesso Total)//
      Gate::before( function (User $user){

      
      //if ($user->hasAnyRoles('Super') ) {

      // Recuperada session roles criada em UserEventSubscriber; 
        if ( in_array('Super', session('roles')) ) {

          return true;
        }
      });

    }
  }
