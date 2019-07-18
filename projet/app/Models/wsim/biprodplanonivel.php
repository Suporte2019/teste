<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;


class biprodplanonivel extends Model
{
 
	
   
    public $timestamps = false;
    
    protected $table = 'bi_prod_plano_nivel';
    protected $fillable = [
							'id',
							'id_nivel',
							'nome',
							'dt_alt',

									];

	 
  
  
}
