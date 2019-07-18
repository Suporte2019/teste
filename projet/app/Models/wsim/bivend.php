<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;


class bivend extends Model
{
    
    public $timestamps = false;
    
    protected $table = 'bi_vend';
    protected $fillable = [
							'id',
							'id_vend',
							'nome',
							'id_vend_tp',
							'id_regional',
							'ativo',
							'dt_alt',
	 							];

 
  
}
