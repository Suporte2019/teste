<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;


class bipessoa extends Model
{

    public $timestamps = false;
    
    protected $table = 'bi_pessoa';
    protected $fillable = [
							'id',
							'id_pessoa',
							'nome',
							'cidade',
							'uf',
							'id_vend',
							'id_regiao',
							'id_categ',
							'ativo',
							'dt_alt',

									];


public function uf(){

	return $this->belongsTo('App\Models\Cadastros\UF',id);
}
public function categoria(){

	return $this->belongsTo('App\Models\Cadastros\categoria',id_categ);
}
public function regiao(){

	return $this->belongsTo('App\Models\Cadastros\regiao',id_regiao);
}

  
  
}
