<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\wsim\biprod;
use App\Models\wsim\biprodgrupo;


class biprodController extends Controller
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
      $produtos = DB::table('bi_prod')->where('nome', 'LIKE', '%' . $request->criterio . '%')
                                                             ->orderBy('id_item', 'asc')
                                                             ->paginate(7);
    }
    else
    {
      $produto = biprod::paginate(7);
    } 

	return view ('wsim.biprod.index',compact('produtos','form'));
}

public function create()
{

   $grupoprodutos = biprodgrupo::all();
    
	return view ('wsim.biprod.create',compact('grupoprodutos','form'));
}

public function store(\App\Http\Requests\ProdutoRequest $request)
{

    biprod::create($request->all());

    \Session::flash('mgs_sucesso',[
		'msg'=>"PRODUTO adicionado com sucesso!",
		'class'=>"alert-success"	
    	]);
	return redirect()->route('produto.create');
}

public function edit($id)
{

    $grupoprodutos =biprodgrupo::all();

    $produto = biprod::find($id);

    if(!$produto){
    	 \Session::flash('mgs_erro',[
		'msg'=>"PRODUTO não existe cadastrado! Deseja cadastrar um novo PRODUTO?",
		'class'=>"alert-danger"	
    	]);

    	 return redirect()->route('produto.create');
    }
	return view ('wsim.biprod.edit',compact('produto','grupoprodutos'));
}


public function update(\App\Http\Requests\ProdutoRequest $request, $id)
{

   biprod::find($id)->update($request->all());

    
    	 \Session::flash('mgs_sucesso',[
		'msg'=>"PRODUTO atualizada com sucesso!",
		'class'=>"alert-success"	
    	]);

    	 return redirect()->route('produto.index');
}
	
public function destroy($id)
{

    $produto = biprod::find($id)->delete();

     \Session::flash('mgs_sucesso',[
        'msg'=>"PRODUTO deletado com sucesso!",
        'class'=>"alert-success"    
        ]);

         return redirect()->route('produto.index');
}
public function show($id)
{

}
   
}

