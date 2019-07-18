<?php

namespace App\Models\wsim\Administracao;

use Illuminate\Database\Eloquent\Model;



class Empresa extends Model
{
 
	
   
    public $timestamps = false;
    
    protected $table = 'empresas';
    protected $fillable = [
							'id',
							'nome',
							'cnpj',
							'razao',
							'endereco',
							'numero',
							'bairro',
							'cidade',
							'db',

									];

		
  
}
