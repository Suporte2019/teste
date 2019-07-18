<?php

namespace App\Empresa\Database;

use App\Models\wsim\Administracao\Empresa;
use Illuminate\Support\Facades\DB;


class CriaDatabase
{

	public function criadatabase(Empresa $empresa)
	
	{
		
       	return DB::statement("

	      CREATE DATABASE {$empresa->db} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
			
			");

	}
}