<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;




class biprod extends Model
{
 
	

    public $timestamps = false;
    
    protected $table = 'bi_prod';
    protected $fillable = [
							'id',
							'id_item',
							'nome',
							'id_grupo',
							'un',
							'fator_conv',
							'ativo',
							'dt_alt',

									];

public function grupoproduto(){

	return $this->belongsTo('App\Models\Cadastros\grupoproduto',id_grupo);
}
 
  
  
}
