<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\wsim\ACL\Permission;
use App\Models\wsim\ACL\Role;
use App\Models\wsim\Administracao\Log\log_acesso;

class User extends Authenticatable
{
 use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
    'name', 'email', 'password','tipo','empresa',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];

    public function roles()
    {
     return $this->belongsToMany(\App\Models\wsim\ACL\Role::class);
    }                              

 //recupera as roles atribuidas as permission e verifica se o user logado
 //tem a role atribuída a ele, se sim, retorna true//
    public function hasPermission(Permission $permission)
    { 
     $permissoesDoUsuario = session('permissions');

     //dd($permissoesDoUsuario);
     
    return in_array($permission->nome, $permissoesDoUsuario);

     //return $this->hasAnyRoles($permission->roles);
    }

          //Retorna as roles ( grupos) pertencente ao usuário logado.
          //Usuário pode ter um ou mais grupos vinculados a ele.
    public function hasAnyRoles($roles)
    {

    //$rolesDoUsuario = session('roles');
     
    return in_array($roles->nome, $rolesDoUsuario);

    }
    
         //IF caso o GRUPO retorne um array ou um objeto.     
     //if (is_array($roles) || is_object($roles))
     //{

        //retorna a qtde de vinculo usuário x role, se retornar
        //1 ou mais, retona = true se não, false //               
     // return !! $roles->intersect($this->roles)->count();

       //  }  //return $this->roles->contains('nome',$roles->nome);   


         //retorna o nome da role ( grupos )
       //  return $this->roles->contains('nome', $roles);    

      //  }

    public function log_acessos()
    {
    // Relacionamento de 1 para muitos (one to many):;
    return $this->hasMany(log_acesso::class);
    }

    public function registra_log_acesso()
    {
    // Cadastra na tabela acesso um novo registro com as informações do usuário logado + data e hora;
    return $this->log_acessos()->create([
        'user_id'   => $this->id,
        'nome'      => $this->name,
        'login'     => $this->email,
        'datalogin' => date('YmdHis'),
        
        ]);
    }

     

}
