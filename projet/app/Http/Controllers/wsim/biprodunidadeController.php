<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\wsim\biprodunidade;


class biprodunidadeController extends Controller
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
      $unidadeprodutos = DB::table('bi_prod_unidade')->where('nome', 'LIKE', '%' . $request->criterio . '%')->orderBy('id_unid', 'asc')->paginate(7);
    }
    else
    {
      $unidadeprodutos = biprodunidade::paginate(7);
    } 
 	return view ('wsim.biprodunidade.index',compact('unidadeprodutos','form'));
}

public function create()
{
    
	return view ('wsim.biprodunidade.create');
}

public function store(\App\Http\Requests\UnidadeProdutoRequest $request)
{

 biprodunidade::create($request->all());

    \Session::flash('mgs_sucesso',[
		'msg'=>"UNIDADE DO PRODUTO adicionada com sucesso!",
		'class'=>"alert-success"	
    	]);
	return redirect()->route('produtounidade.create');
}

public function edit($id)
{

    $unidadeproduto = biprodunidade::find($id);

    if(!$unidadeproduto){
    	 \Session::flash('mgs_erro',[
		'msg'=>"UNIDADE DO PRODUTO não existe cadastrada! Deseja cadastrar uma nova UNIDADE DO PRODUTO?",
		'class'=>"alert-danger"	
    	]);

    	 return redirect()->route('produtounidade.create');
    }
	return view ('wsim.biprodunidade.edit',compact('unidadeproduto'));
}


public function update(\App\Http\Requests\UnidadeProdutoRequest $request, $id)
{

  biprodunidade::find($id)->update($request->all());
    
    	 \Session::flash('mgs_sucesso',[
		'msg'=>"UNIDADE DO PRODUTO atualizada com sucesso!",
		'class'=>"alert-success"	
    	]);

    	 return redirect()->route('produtounidade.index');
}
	
public function destroy($id)
{

    $unidadeproduto = biprodunidade::find($id)->delete();

     \Session::flash('mgs_sucesso',[
        'msg'=>"UNIDADE DO PRODUTO deletada com sucesso!",
        'class'=>"alert-success"    
        ]);

         return redirect()->route('produtounidade.index');
}

public function show($id)
{

}
 


}

