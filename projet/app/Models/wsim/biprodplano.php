<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;


class biprodplano extends Model
{
 
	
   
    public $timestamps = false;
    
    protected $table = 'bi_prod_plano';
    protected $fillable = [
							'id',
							'id_it_plano',
							'nivel',
							'cod_nivel_pai',
							'id_pai',
							'nivel_cod',
							'nivel_nome',
							'id_it_grupo',
							'dt_alt',

									];

public function nivelplano(){

	return $this->belongsTo('App\Models\Cadastros\nivelplano',id_nivel);
} 
  
  
}
