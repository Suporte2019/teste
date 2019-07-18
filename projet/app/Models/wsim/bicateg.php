<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;



class bicateg extends Model
{
 
	
   
    public $timestamps = false;
    
    protected $table = 'bi_categ';
    protected $fillable = [
							'id',
							'id_categ',
							'nome',
							'dt_alt',

									];


	
  
}
