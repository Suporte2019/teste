<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;


class biprodgrupo extends Model
{
 
	
   
    public $timestamps = false;
    
    protected $table = 'bi_prod_grupo';
    protected $fillable = [
							'id',
							'id_grupo',
							'nome',
							'dt_alt',

									];

	   
  
}
