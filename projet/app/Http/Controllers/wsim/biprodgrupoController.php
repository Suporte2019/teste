<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\wsim\biprodgrupo;


class biprodgrupoController extends Controller
{
    
public function __construct()
    {
     $this->middleware('auth');
    }

    /**
     * Direcionar para autenticação.
     *
     *@return \Illuminate\Http\Response
     */

public function index(Request $request)
{
     // variável $form recebe do formulario para ajuste de paginação //
    $form = $request->except('_token');
   
    if($request)
    {
      $grupoprodutos = DB::table('bi_prod_grupo')->where('nome', 'LIKE', '%' . $request->criterio . '%')
                                                                                    ->orderBy('id_grupo', 'asc')
                                                                                    ->paginate(7);
    }
    else
    {
      $grupoprodutos = biprodgrupo::paginate(7);
    } 
   
 	return view ('wsim.biprodgrupo.index',compact('grupoprodutos','form'));
}

public function create()
{
    
	return view ('wsim.biprodgrupo.create');
}

public function store(\App\Http\Requests\GrupoProdutoRequest $request)
{

   biprodgrupo::create($request->all());

    \Session::flash('mgs_sucesso',[
		'msg'=>"GRUPO DE PRODUTO adicionado com sucesso!",
		'class'=>"alert-success"	
    	]);
	return redirect()->route('produtogrupo.create');
}

public function edit($id)
{
    $grupoproduto = biprodgrupo::find($id);

    if(!$grupoproduto){
    	 \Session::flash('mgs_erro',[
		'msg'=>"GRUPO DE PRODUTO não existe cadastrada! Deseja cadastrar um novo GRUPO DE PRODUTO?",
		'class'=>"alert-danger"	
    	]);

    	 return redirect()->route('produtogrupo.create');
    }
	return view ('wsim.biprodgrupo.edit',compact('grupoproduto'));
}


public function update(\App\Http\Requests\GrupoProdutoRequest $request, $id)
{

   biprodgrupo::find($id)->update($request->all());
    
    	 \Session::flash('mgs_sucesso',[
		'msg'=>"GRUPO DE PRODUTO atualizado com sucesso!",
		'class'=>"alert-success"	
    	]);

    	 return redirect()->route('produtogrupo.index');
}
	
public function destroy($id)
{

    $grupoproduto = biprodgrupo::find($id)->delete();

     \Session::flash('mgs_sucesso',[
        'msg'=>"GRUPO DE PRODUTO deletada com sucesso!",
        'class'=>"alert-success"    
        ]);

         return redirect()->route('produtogrupo.index');
}
public function show($id)
{

}

}

