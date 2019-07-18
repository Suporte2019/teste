<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;




class bivendtipo extends Model
{
 
	
   
    public $timestamps = false;
    
    protected $table = 'bi_vend_tipo';
    protected $fillable = [
							'id',
							'id_vend_tp',
							'nome',
	 							];



  
  
}
