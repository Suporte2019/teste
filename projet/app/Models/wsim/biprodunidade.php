<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;


class biprodunidade extends Model
{
 
	
   
    public $timestamps = false;
    
    protected $table = 'bi_prod_unidade';
    protected $fillable = [
							'id',
							'id_unid',
							'nome',
							'dt_alt',

									];

	 
  
  
}
