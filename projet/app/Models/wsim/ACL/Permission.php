<?php

namespace App\Models\wsim\ACL;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    
	public $timestamps = false;

	protected $table = 'permissions';
	protected $fillable = [
							  'id',
					     	'nome',
		            		'descricao',
		                	'created_at',
							'updated_at',
 						];


 //Metodo que retorna todas as roles que estão vinculadas as permissions // 
	public function roles()
	{
		return $this->belongsToMany(\App\Models\wsim\ACL\Role::class);
	}

}
