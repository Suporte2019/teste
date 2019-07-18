<?php

namespace App\Empresa;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\schema;
use App\Models\wsim\Emp_User\Emp_User;

class ConectaEmpresa
{
    /* Classe para setar a conexão dinamicamente  */
	
	public function conexao(Emp_User $empresa)
	{
                  //      dd($empresa);

		/* Desconecta se haver alguma conexao */
		
		DB::disconnect('empresa'); 
		/* Seta a conexão */
	config()->set('database.connections.empresa.host', $empresa->db_hostname);
	config()->set('database.connections.empresa.database', $empresa->db_database);
	config()->set('database.connections.empresa.username', $empresa->db_username);
	config()->set('database.connections.empresa.password', $empresa->db_password);
		
	DB::reconnect('empresa');

	 //dd($empresa->db_database);

	/* Faz teste de ping Banco */
	Schema::connection('empresa')->getConnection()->reconnect();

	}
}
