<?php

namespace App\Models\wsim\ACL;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	
	public $timestamps = false;

	protected $table = 'roles';
	protected $fillable = [
							'id',
							'nome',
							'descricao',
							'created_at',
							'updated_at',
	
	];
	

	public function permissions(){
		return $this->belongsToMany(\App\Models\wsim\ACL\Permission::class);
	}

	  public function user(){
  return $this->belongsToMany(\App\user::class);
}		

}
