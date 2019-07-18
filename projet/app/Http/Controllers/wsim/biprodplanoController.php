<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\wsim\biprodplano;


class biprodplanoController extends Controller
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
      $planoprodutos = DB::table('bi_prod_plano')->where('nivel_nome', 'LIKE', '%' . $request->criterio . '%')
                                                                                   ->orderBy('id_it_plano', 'asc')
                                                                                   ->paginate(7);
    }
    else
    {
      $planoprodutos = biprodplano::paginate(7);
    } 
	return view ('wsim.biprodplano.index',compact('planoprodutos','form'));
  }

public function create()
  {

    $nivelplanos = \App\Models\wsim\biprodplanonivel::all();
    $grupoprodutos = \App\Models\wsim\biprodgrupo::all();
    
	return view ('wsim.biprodplano.create', compact('grupoprodutos',
                                                                                         'nivelplanos'));
}

public function store(\App\Http\Requests\PlanoProdutoRequest $request)
  {

    \App\Models\wsim\planoproduto::create($request->all());

    \Session::flash('mgs_sucesso',[
		'msg'=>"PLANO DO PRODUTO adicionado com sucesso!",
		'class'=>"alert-success"	
    	]);
	return redirect()->route('produtoplano.create');
  }

public function edit($id)
  {

    $planoproduto = biprodplano::find($id);
    $nivelplanos = \App\Models\wsim\biprodplanonivel::all();
    $grupoprodutos = \App\Models\wsim\biprodgrupo::all();

    if(!$planoproduto){
    	 \Session::flash('mgs_erro',[
		'msg'=>"PLANO DO PRODUTO não existe cadastrada! Deseja cadastrar um novo PLANO DO PRODUTO?",
		'class'=>"alert-danger"	
    	]);

    	 return redirect()->route('produtoplano.create');
    }
	return view ('wsim.biprodplano.edit',compact('planoproduto',
                                                                                    'nivelplanos',
                                                                                    'grupoprodutos' ));
  }

public function update(\App\Http\Requests\PlanoProdutoRequest $request, $id)
  {

   biprodplano::find($id)->update($request->all());
    
    	 \Session::flash('mgs_sucesso',[
		'msg'=>"PLANO DO PRODUTO atualizado com sucesso!",
		'class'=>"alert-success"	
    	]);

    	 return redirect()->route('produtoplano.index');
  }
	
public function destroy($id)
  {

    $planoproduto = biprodplano::find($id)->delete();

     \Session::flash('mgs_sucesso',[
        'msg'=>"PLANO DO PRODUTO deletado com sucesso!",
        'class'=>"alert-success"    
        ]);

         return redirect()->route('produtoplano.index');
  }
  public function show($id)
{

}

public function filtraplano($id_nivel)
  {

   $planoprodutos = DB::table('bi_prod_plano')->where('nivel', '=' ,$id_nivel )
                                                                                ->orderBy('id_it_plano', 'asc')
                                                                                ->paginate(7);
       
  return view ('wsim.biprodplano.index',compact('planoprodutos'));

  }

}

