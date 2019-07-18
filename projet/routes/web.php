<?php

Auth::routes();

Route::get('/wsim', 'HomeController@index')->name('home');

Route::get('/', function () {
   // return view('welcome');
    return view('vendor.adminlte.login');
});

//Route::get('phpinfo', function ($phpinfo = 'phpinfo()') {
  // return 'phpinfo';
//});
Route::view('/vinculado','wsim.Administracao.Emp_User.erro.erro')->name('erro');
//--------------------------------------------------------------------------//

// Rotas Módulo Administrativo

Route::group(['prefix' => 'adm'], function(){
   
    // Rota Logs de Acesso Usuário
    Route::resource('consulta/log_acesso','wsim\Administracao\Log\log_acessoController');

    // Rota Mostra PHPinfo
    Route::get('consulta/phpinfo','wsim\Administracao\phpinfoController@index');

    // Rota Cadastro Usuário
    Route::resource('/usuario','wsim\userController');
    
    Route::get('/usuario/{id}/role',['uses'=>'wsim\userController@filtrarole','as'=>'usuario.filtrarole']);

     Route::get('/usuario/{id}/permission',['uses'=>'wsim\userController@userpermission','as'=>'usuario.userpermission']);
    
    // Rotas Cadastro ACL -> Role
    Route::resource('/grupo','wsim\ACL\roleController');
    // Rota Cadastro/Visualização ACL -> Role/Permission
    Route::get('/grupo/{id}/permission',['uses'=>'wsim\ACL\roleController@filtrapermission','as'=>'grupo.filtrapermission']);
    // Rota Cadastro/Visualização ACL -> Role/User
    Route::get('/grupo/{id}/user',['uses'=>'wsim\ACL\roleController@filtrauser','as'=>'grupo.filtrauser']);

    // Rota ACL -> Permission
    Route::resource('/permissao','wsim\ACL\permissionController');
    // Rota ACL -> Permission/Role
    Route::get('/permission/{id}/role',['uses'=>'wsim\ACL\permissionController@filtrarole','as'=>'permissao.filtrarole']);

    
    // Rota Empresa
    Route::resource('/empresa','wsim\Administracao\EmpresaController');

    // Rota Empresa x Usuario
    Route::resource('/emp_user','wsim\Administracao\Emp_User\Emp_UserController');

    // Rota Troca Empresa
    Route::get('/trocaempresa/conecta',['uses'=>'wsim\Administracao\Emp_User\TrocaEmpresaController@conecta','as'=>'trocaempresa.conecta']);
    
    Route::get('/trocaempresa/lista',['uses'=>'wsim\Administracao\Emp_User\TrocaEmpresaController@lista','as'=>'trocaempresa.lista']);

    


});

// Mostra grupo / permissioes do usuario MELHORAR //

Route::get('/rolepermission',['uses'=>'HomeController@rolepermission','as'=>'rolepermission.rolepermission']);

//------------------------------------------------------------------------------//

// Rotas Módulo BI

Route::group(['prefix' => 'bi'], function(){

	
    Route::view('/acesso_negado','wsim.BI.acesso_negado')->name('acesso_negado');

     // Rotas Cadastro Categorias
     Route::resource('cadastro/categoria','wsim\bicategController');

     // Rotas Cadastro Condição de Pagamento
     Route::resource('cadastro/condpagto','wsim\bicondpagtoController');

     // Rotas Cadastro Estabelecimento
     Route::resource('cadastro/estabelecimento','wsim\biestabController');

     // Rotas Cadastro Pessoa
	 Route::resource('cadastro/pessoa','wsim\bipessoaController');

	 // Rotas Cadastro Grupo de produto
     Route::resource('cadastro/produtogrupo','wsim\biprodgrupoController');
     
     // Rotas Cadastro Produto
     Route::resource('cadastro/produto','wsim\biprodController');

     // rota cadastro Nível Plano
     Route::resource('cadastro/produtoplanonivel','wsim\biprodplanonivelController');

     // Rotas Cadastro Plano Produto
     Route::resource('cadastro/produtoplano','wsim\biprodplanoController');
     // Rotas Cadastro/visualização Nível Plano Produto
     Route::get('cadastro/produtoplano/filtraplano/{id_nivel}',['uses'=>'wsim\biprodplanoController@filtraplano','as'=>'biprodplano.filtraplano']);

     // Rotas Cadastro Unidade Produto
     Route::resource('cadastro/produtounidade','wsim\biprodunidadeController');

     // Rotas Cadastro Região
     Route::resource('cadastro/regiao','wsim\biregiaoController');

	 // Rotas Cadastro Regional
     Route::resource('cadastro/regional','wsim\biregionalController');

     // Rotas Cadastro Tipo de Vendedor
     Route::resource('cadastro/vendedortipo','wsim\bivendtipoController');

     // Rotas Cadastro Vendedor
     Route::resource('cadastro/vendedor','wsim\bivendController');

     // Rotas Tarefas Importar Faturamento
     Route::get('tarefas/impfaturamento',['uses'=>'wsim\BI\tarefas\importaDadosController@impfaturamento','as'=>'impfaturamento']);

     Route::post('tarefas/impfaturamento',['uses'=>'wsim\BI\tarefas\importaDadosController@impfaturamentocsv','as'=>'impfaturamento']);

     // Rotas Tarefas Exporta Faturamento XLSL
     Route::get('tarefas/expfaturamentoslsx',['uses'=>'wsim\BI\tarefas\importaDadosController@expfaturamentoXLSX','as'=>'bifatura.expXLSX']);

     // Rotas Tarefas Exporta Faturamento CSV
     Route::get('tarefas/expfaturamentocsv',['uses'=>'wsim\BI\tarefas\importaDadosController@expfaturamentoCSV','as'=>'bifatura.expCSV']);
     
     

});


     // Rotas Módulo METAS

     Route::group(['prefix' => 'metas'], function(){

     // rota cadastro metas
     Route::resource('cadastro/meta','wsim\METAS\mtmetaController');
    
     // rota cadastro periodo
     Route::resource('cadastro/periodo','wsim\METAS\mtperiodoController');

     // rota cadastro configura metas
     Route::resource('cadastro/configmeta','wsim\METAS\configmetaController');

     // rota cadastro calendário
     Route::resource('cadastro/calendario','wsim\METAS\mtcalendarioController');

     // rota cadastro calendário
     Route::resource('cadastro/zebra','wsim\METAS\zebraController');


});



// Rotas de testes Módulo BI - melhorar isso

Route::get('/produto/xlsx',['uses'=>'wsim\administracao\exportarController@xlsx','as'=>'biprod.xlsx']);
Route::get('/produto/csv',['uses'=>'wsim\administracao\exportarController@csv','as'=>'biprod.csv']);
Route::get('/produto/pdf',['uses'=>'wsim\relatorios\ReportsbiprodController@pdf','as'=>'biprod.pdf']);
	




// rota Grafico

//Route::resource('/grafico','wsim\Grafico\graficoController');

// rotas referente a Relatórios

Route::get('/relatorio/lista',['uses'=>'wsim\Relatorios\RelatorioController@lista','as'=>'relatorio.lista']);
Route::get('/relatorio/gerar',['uses'=>'wsim\Relatorios\RelatorioController@gerar','as'=>'relatorio.gerar']);
Route::get('/relatorio/teste',['uses'=>'wsim\Relatorios\RelatorioController@novapagina','as'=>'relatorio.novapagina']);


//return ("Ola mundo");





