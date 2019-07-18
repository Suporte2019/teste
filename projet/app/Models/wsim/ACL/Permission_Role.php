<?php

namespace App\Models\wsim\ACL;

use Illuminate\Database\Eloquent\Model;

class permission_role extends Model
{
     
  
    public $timestamps = false;
    
    protected $table = 'permission_role';
    protected $fillable = [
							'id',
							'permission_id',
							'role_id',
							

									];

}
