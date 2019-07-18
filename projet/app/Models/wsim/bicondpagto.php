<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;


class bicondpagto extends Model
{
 

   
    public $timestamps = false;
    
    protected $table = 'bi_cond_pagto';
    protected $fillable = [
							'id',
							'id_cond_pag',
							'nome',
							'parcelas',
							'prazo_medio',
							'dt_alt',

									];



   


  
  
}
