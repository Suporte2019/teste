<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;




class biestab extends Model
{
 

     
    public $timestamps = false;
    
    protected $table = 'bi_estab';
    protected $fillable = [
							'id',
							'id_estab',
							'nome',
							'ativo',

									];

	

   
 
  
  
}
