<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\wsim\biestab;


class biestabController extends Controller
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
      $estabelecimentos = DB::table('bi_estab')->where('nome', 'LIKE', '%' . $request->criterio . '%')                      ->orderBy('id_estab', 'asc')
                                               ->paginate(7);
    }
    else
    {
      $estabelecimentos = biestab::paginate(7);
    } 
   
	return view ('wsim.biestab.index',compact('estabelecimentos','form'));
}

public function create()
{
    	return view ('wsim.biestab.create');
}

public function store(\App\Http\Requests\EstabelecimentoRequest $request)
{

     biestab::create($request->all());

    \Session::flash('mgs_sucesso',[
		'msg'=>"ESTABELECIMENTO adicionado com sucesso!",
		'class'=>"alert-success"	
    	]);
	return redirect()->route('estabelecimento.create');
}

public function edit($id)
{

    $estabelecimento = biestab::find($id);

    if(!$estabelecimento){
    	 \Session::flash('mgs_erro',[
		'msg'=>"ESTABELECIMENTO não existe cadastrada! Deseja cadastrar uma nova Estabelecimento?",
		'class'=>"alert-danger"	
    	]);

    	 return redirect()->route('estabelecimento.create');
    }
	return view ('wsim.biestab.edit',compact('estabelecimento'));
}


public function update(\App\Http\Requests\EstabelecimentoRequest $request, $id)
{

   biestab::find($id)->update($request->all());

    
    	 \Session::flash('mgs_sucesso',[
		'msg'=>"ESTABELECIMENTO atualizado com sucesso!",
		'class'=>"alert-success"	
    	]);

    	 return redirect()->route('estabelecimento.index');
}
	
public function destroy($id)
{

    $categoria = biestab::find($id)->delete();

    //$categoria->delete();

     \Session::flash('mgs_sucesso',[
        'msg'=>"ESTABELECIMENTO deletado com sucesso!",
        'class'=>"alert-success"    
        ]);

         return redirect()->route('estabelecimento.index');
}
public function show($id)
{

}

}

