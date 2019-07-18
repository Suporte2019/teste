<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\wsim\biregional;


class biregionalController extends Controller
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
      $regionais = DB::table('bi_regional')->where('nome', 'LIKE', '%' . $request->criterio . '%')
                                                                    ->orderBy('id_regional', 'asc')
                                                                    ->paginate(7);
    }
    else
    {
      $regionais = biregional::paginate(7);
    } 
     
	return view ('wsim.biregional.index',compact('regionais','form'));
}

public function create()
{
	return view ('wsim.biregional.create');
}

public function store(\App\Http\Requests\RegionalRequest $request)
{

biregional::create($request->all());

    \Session::flash('mgs_sucesso',[
		'msg'=>"REGIONAL adicionada com sucesso!",
		'class'=>"alert-success"	
    	]);
	return redirect()->route('regional.create');
}

public function edit($id)
{
    $regional = biregional::find($id);

    if(!$regional){
    	 \Session::flash('mgs_erro',[
		'msg'=>"REGIONAL não existe cadastrada! Deseja cadastrar uma nova REGIONAL?",
		'class'=>"alert-danger"	
    	]);

    	 return redirect()->route('regional.create');
    }
	return view ('wsim.biregional.edit',compact('regional'));
}


public function update(\App\Http\Requests\RegionalRequest $request, $id)
{

   biregional::find($id)->update($request->all());
    
    	 \Session::flash('mgs_sucesso',[
		'msg'=>"REGIONAL atualizada com sucesso!",
		'class'=>"alert-success"	
    	]);

    	 return redirect()->route('regional.index');
}
	
public function destroy($id)
{

    $regional = biregional::find($id)->delete();

     \Session::flash('mgs_sucesso',[
        'msg'=>"REGIONAL deletada com sucesso!",
        'class'=>"alert-success"    
        ]);

         return redirect()->route('regional.index');
}
public function show()
{
}


}

