<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;




class biregiao extends Model
{
 
	
   
    public $timestamps = false;
    
    protected $table = 'bi_regiao';
    protected $fillable = [
							'id',
							'id_regiao',
							'id_regional',
							'nome',
							'ativo',
							'dt_alt',

									];

 
 
  
  
}
