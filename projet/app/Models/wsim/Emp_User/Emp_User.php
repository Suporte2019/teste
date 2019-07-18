<?php

namespace App\Models\wsim\Emp_User;

use Illuminate\Database\Eloquent\Model;

class Emp_User extends Model
{
   
   
    public $timestamps = false;
    
    protected $table = 'emp_user';
    protected $fillable = [
							'id',
							'id_emp',
							'id_usuario',
							'nome_empresa',
							'db_database',
							'db_hostname',
							'db_username',
							'db_password',
							'usuario',
							'validade',
							'created_at',
							'updated_at',
     						];

		
}
