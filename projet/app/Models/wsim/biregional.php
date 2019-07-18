<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;




class biregional extends Model
{
 
	
   
    public $timestamps = false;
    
    protected $table = 'bi_regional';
    protected $fillable = [
							'id',
							'id_regional',
							'nome',
							'ativo',
							'dt_alt',

									];

 
 
  
  
}
