<?php

namespace App\Models\wsim\Administracao\Log;

use Illuminate\Database\Eloquent\Model;

class log_acesso extends Model
{
 
    public $timestamps = false;
    
    protected $table = 'log_acessos';
    protected $fillable = ['user_id', 
    											 'nome',
    											 'login',
    											 'tipo',
    											 'data', 
    											 //'datalogout',
    											];
  
}
