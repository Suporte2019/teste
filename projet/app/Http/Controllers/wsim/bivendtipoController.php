<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\wsim\bivendtipo;


class bivendtipoController extends Controller
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
    // variável $form recebe do formulário para ajuste de paginação //
    $form = $request->except('_token');
       
    if($request)
    {
      $vendedortipos = DB::table('bi_vend_tipo')->where('nome', 'LIKE', '%' . $request->criterio . '%')
                                                                                ->orderBy('id_vend_tp', 'asc')
                                                                                ->paginate(7);
    }
    else
    {
      $vendedortipos = bivendtipo::paginate(7);
    } 
	return view ('wsim.bivendtipo.index',compact('vendedortipos','form'));
}

public function create()
{
	return view ('wsim.bivendtipo.create');
}

public function store(\App\Http\Requests\VendedorTipoRequest $request)
{

   bivendtipo::create($request->all());

    \Session::flash('mgs_sucesso',[
		'msg'=>"TIPO DE VENDEDOR adicionado com sucesso!",
		'class'=>"alert-success"	
    	]);
	return redirect()->route('vendedortipo.create');
}

public function edit($id)
{

    $vendedortipo = bivendtipo::find($id);

    if(!$vendedortipo){
    	 \Session::flash('mgs_erro',[
		'msg'=>"TIPO DE VENDEDOR não existe cadastrado! Deseja cadastrar um novo TIPO DE VENDEDOR?",
		'class'=>"alert-danger"	
    	]);

    	 return redirect()->route('vendedortipo.create');
    }
	return view ('wsim.bivendtipo.edit',compact('vendedortipo'));
}


public function update(\App\Http\Requests\VendedorTipoRequest $request, $id)
{

    bivendtipo::find($id)->update($request->all());
    
    	 \Session::flash('mgs_sucesso',[
		'msg'=>"TIPO DE VENDEDOR atualizado com sucesso!",
		'class'=>"alert-success"	
    	]);

    	 return redirect()->route('vendedortipo.index');
}
	
public function destroy($id)
{
    $vendedortipo = bivendtipo::find($id)->delete();

     \Session::flash('mgs_sucesso',[
        'msg'=>"TIPO DE VENDEDOR deletado com sucesso!",
        'class'=>"alert-success"    
        ]);

         return redirect()->route('vendedortipo.index');
}
public function show()
{
}

}

