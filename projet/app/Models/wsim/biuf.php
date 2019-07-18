<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;




class biuf extends Model
{
 
	
   
    public $timestamps = false;
    
    protected $table = 'bi_uf';
    protected $fillable = [
							'id',
							'uf',
							'nome',
	 							];



  
  
}
