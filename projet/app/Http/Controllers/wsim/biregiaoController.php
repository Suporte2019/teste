<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\wsim\biregiao;
use App\Models\wsim\biregional;

class biregiaoController extends Controller
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
      $regioes = DB::table('bi_regiao')->where('nome', 'LIKE', '%' . $request->criterio . '%')
                                                              ->orderBy('id_regiao', 'asc')
                                                              ->paginate(7);
    }
    else
    {
      $regioes = biregiao::paginate(7);
    } 

    	return view ('wsim.biregiao.index',compact('regioes','form'));
}

public function create()
{

    $regionais = biregional::all();

	return view ('wsim.biregiao.create',compact('regionais'));
}

public function store(\App\Http\Requests\RegiaoRequest $request)
{

   biregiao::create($request->all());

    \Session::flash('mgs_sucesso',[
		'msg'=>"REGIAO Adicionada com sucesso!",
		'class'=>"alert-success"	
    	]);
	return redirect()->route('regiao.create');
}

public function edit($id)
{

    $regiao = biregiao::find($id);

    $regionais = \App\Models\wsim\biregional::all();

    if(!$regiao){
    	 \Session::flash('mgs_erro',[
		'msg'=>"REGIÃO não existe cadastrada! Deseja cadastrar uma nova regiao?",
		'class'=>"alert-danger"	
    	]);

    	 return redirect()->route('regiao.create');
    }
	return view ('wsim.biregiao.edit',compact('regiao','regionais'));
}


public function update(\App\Http\Requests\RegiaoRequest $request, $id)
{

   biregiao::find($id)->update($request->all());
    
    	 \Session::flash('mgs_sucesso',[
		'msg'=>"REGIÃO atualizada com sucesso!",
		'class'=>"alert-success"	
    	]);

    	 return redirect()->route('regiao.index');
}
	
public function destroy($id)
{

    $regiao = biregiao::find($id)->delete();

     \Session::flash('mgs_sucesso',[
        'msg'=>"REGIÃO deletada com sucesso!",
        'class'=>"alert-success"    
        ]);

         return redirect()->route('regiao.index');
}




   


}

