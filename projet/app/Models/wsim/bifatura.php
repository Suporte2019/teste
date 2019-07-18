<?php

namespace App\Models\wsim;

use Illuminate\Database\Eloquent\Model;



class bifatura extends Model
{
 
	
   
    public $timestamps = false;
    
    protected $table = 'bi_fatura';
    protected $fillable = [
							'id',
							'dt_emis',
							'id_estab',
							'id_regiao',
							'id_vend',
							'id_categ',
							'id_cli',
							'id_cond_pag',
							'id_unid',
							'qtde',
							'vl_uni',
							'vl_total',
							'nf',
							'serie',
							'nr_pedido',

									];

		
  
}
