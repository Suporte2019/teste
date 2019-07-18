<?php



Route::get('/', function () {
   // return view('welcome');
    return view('vendor.adminlte.login');
});

//Route::get('phpinfo', function () {
  //  return view('wsim.Administracao.Phpinfo.index');
//});



//Route::get('/relatorio/familia',['uses'=>'wsim\administracao\ReportsfamiliaController@index','as'=>'familia.index']);

//rotas referente ao painel administrativo: Users / Roles / Permission

//Route::get('/testeemail',['uses'=>'wsim\administracao\emailController@index','as'=>'email.index']);
//Route::get('/primeiroemail',['uses'=>'wsim\administracao\emailController@primeiroemail','as'=>'email.primeiroemail']);

//Route::get('/registra_usuario',['uses'=>'RegisterController@register','as'=>'user.registra']);

//Route::get('/importar/dados',['uses'=>'wsim\administracao\importarController@importarindex','as'=>'importar.index']);
//Route::post('/import',['uses'=>'wsim\administracao\importarController@importarcsv','as'=>'importar.csv']);

// Rota para testar usuário/grupo/permissoes -> usuario logado //

Route::get('/rolepermission',['uses'=>'HomeController@rolepermission','as'=>'rolepermission.rolepermission']);

// rotas Usuário

Route::resource('/usuario','wsim\userController');

Route::get('/usuario/{id}/role',['uses'=>'wsim\userController@filtrarole','as'=>'usuario.filtrarole']);

// rotas ACL -> Role

Route::resource('/grupo','wsim\ACL\roleController');

Route::get('/grupo/{id}/permission',['uses'=>'wsim\ACL\roleController@filtrapermission','as'=>'grupo.filtrapermission']);

Route::get('/grupo/{id}/user',['uses'=>'wsim\ACL\roleController@filtrauser','as'=>'grupo.filtrauser']);


// rotas ACL -> Permission

Route::resource('/permissao','wsim\ACL\permissionController');

Route::get('/permission/{id}/role',['uses'=>'wsim\ACL\permissionController@filtrarole','as'=>'permissao.filtrarole']);

// rotas Empresas

Route::resource('/empresa','wsim\Administracao\EmpresaController');


// rotas Empresa x Usuario

Route::resource('/emp_user','wsim\Administracao\Emp_User\Emp_UserController');


 // rotas Troca Empresa

 Route::get('/trocaempresa/conecta',['uses'=>'wsim\Administracao\Emp_User\TrocaEmpresaController@conecta','as'=>'trocaempresa.conecta']);
 Route::get('/trocaempresa/lista',['uses'=>'wsim\Administracao\Emp_User\TrocaEmpresaController@lista','as'=>'trocaempresa.lista']);

 // rota Mostra PHPinfo

Route::resource('/phpinfo','wsim\Administracao\phpinfoController');


// rota Categorias

Route::resource('/categoria','wsim\bicategController');

// rota Condição de Pagamento

Route::resource('/condpagto','wsim\bicondpagtoController');

// rota Estabelecimento

Route::resource('/estabelecimento','wsim\biestabController');

/// rota Pessoa

Route::resource('/pessoa','wsim\bipessoaController');

/// rota Produto

Route::resource('/produto','wsim\biprodController');

Route::get('/produto/xlsx',['uses'=>'wsim\administracao\exportarController@xlsx','as'=>'biprod.xlsx']);
Route::get('/produto/csv',['uses'=>'wsim\administracao\exportarController@csv','as'=>'biprod.csv']);
Route::get('/produto/pdf',['uses'=>'wsim\relatorios\ReportsbiprodController@pdf','as'=>'biprod.pdf']);
	

/// rotas referente a grupoproduto

Route::resource('/produtogrupo','wsim\biprodgrupoController');

/// rota Plano Produto

Route::resource('/produtoplano','wsim\biprodplanoController');

// rotas referente a Nível Plano

Route::resource('/produtoplanonivel','wsim\biprodplanonivelController');

Route::get('/produtoplano/filtraplano/{id_nivel}',['uses'=>'wsim\biprodplanoController@filtraplano','as'=>'biprodplano.filtraplano']);

/// rota Unidade Produto

Route::resource('/produtounidade','wsim\biprodunidadeController');

/// rota Região

Route::resource('/regiao','wsim\biregiaoController');

/// rota Regional

Route::resource('/regional','wsim\biregionalController');

// rota Tipo de Vendedor

Route::resource('/vendedortipo','wsim\bivendtipoController');

// rota Vendedor

Route::resource('/vendedor','wsim\bivendController');

// rotas referente a Relatórios

Route::get('/relatorio/lista',['uses'=>'wsim\Relatorios\RelatorioController@lista','as'=>'relatorio.lista']);
Route::get('/relatorio/gerar',['uses'=>'wsim\Relatorios\RelatorioController@gerar','as'=>'relatorio.gerar']);
Route::get('/relatorio/teste',['uses'=>'wsim\Relatorios\RelatorioController@novapagina','as'=>'relatorio.novapagina']);


//return ("Ola mundo");


Auth::routes();

Route::get('/wsim', 'HomeController@index')->name('home');
