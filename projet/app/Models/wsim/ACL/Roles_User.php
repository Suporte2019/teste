<?php

namespace App\Models\wsim\ACL;

use Illuminate\Database\Eloquent\Model;

class roles_user extends Model
{
    
    public $timestamps = false;
    
    protected $table = 'roles_user';
    protected $fillable = [
							'id',
							'role_id',
							'user_id',
							

									];

}
