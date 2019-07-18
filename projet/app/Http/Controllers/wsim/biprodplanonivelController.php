<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\wsim\biprodplanonivel;


class biprodplanonivelController extends Controller
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
      $nivelplanos = DB::table('bi_prod_plano_nivel')->where('nome', 'LIKE', '%' . $request->criterio . '%')
                                                                                        ->orderBy('id_nivel', 'asc')
                                                                                        ->paginate(7);
    }
    else
    {
      $nivelplanos = biprodplanonivel::paginate(7);
    } 
 	return view ('wsim.biprodplanonivel.index',compact('nivelplanos','form'));
}

public function create()
{
    
	return view ('wsim.biprodplanonivel.create');
}

public function store(\App\Http\Requests\NivelPlanoRequest $request)
{

   biprodplanonivel::create($request->all());

    \Session::flash('mgs_sucesso',[
		'msg'=>"NÍVEL DO PLANO adicionado com sucesso!",
		'class'=>"alert-success"	
    	]);
	return redirect()->route('produtoplanonivel.create');
}

public function edit($id)
{

    $nivelplano = biprodplanonivel::find($id);

    if(!$nivelplano){
    	 \Session::flash('mgs_erro',[
		'msg'=>"NÍVEL DO PLANO não existe cadastrado! Deseja cadastrar um novo NÍVEL DO PLANO?",
		'class'=>"alert-danger"	
    	]);

    	 return redirect()->route('produtoplanonivel.create');
    }
	return view ('wsim.biprodplanonivel.edit',compact('nivelplano'));
}


public function update(\App\Http\Requests\NivelPlanoRequest $request, $id)
{

   biprodplanonivel::find($id)->update($request->all());
   
    	 \Session::flash('mgs_sucesso',[
		'msg'=>"NÍVEL DO PLANO atualizado com sucesso!",
		'class'=>"alert-success"	
    	]);

    	 return redirect()->route('produtoplanonivel.index');
}
	
public function destroy($id)
{

    $nivelplano = biprodplanonivel::find($id)->delete();

     \Session::flash('mgs_sucesso',[
        'msg'=>"NÍVEL DO PLANO deletado com sucesso!",
        'class'=>"alert-success"    
        ]);

         return redirect()->route('produtoplanonivel.index');
}
public function show()
{
}

}

