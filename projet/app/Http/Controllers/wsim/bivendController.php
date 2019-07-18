<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\wsim\bivend;
use App\Models\wsim\bivendtipo;
use App\Models\wsim\biregional;

class bivendController extends Controller
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
      $vendedores = DB::table('bi_vend')->where('nome', 'LIKE', '%' . $request->criterio . '%')
                                                                    ->orderBy('id_vend', 'asc')
                                                                    ->paginate(7);
    }
    else
    {
      $vendedores = bivend::paginate(7);
    } 
	return view ('wsim.bivend.index',compact('vendedores','form'));
}

public function create()
{
    $regionais = biregional::all();
    $vendedortipos = bivendtipo::all();
    
	return view ('wsim.bivend.create',compact('vendedortipos','regionais'));
}

public function store(\App\Http\Requests\VendedorRequest $request)
{

    bivend::create($request->all());

    \Session::flash('mgs_sucesso',[
		'msg'=>"VENDEDOR adicionado com sucesso!",
		'class'=>"alert-success"	
    	]);
	return redirect()->route('vendedor.create');
}

public function edit($id)
{

    $vendedortipos = bivendtipo::all();
    $regionais = biregional::all();
    
    $vendedor = bivend::find($id);

    if(!$vendedor){
    	 \Session::flash('mgs_erro',[
		'msg'=>"VENDEDOR não existe cadastrado! Deseja cadastrar um novo VENDEDOR?",
		'class'=>"alert-danger"	
    	]);

    	 return redirect()->route('vendedor.create');
    }
	return view ('wsim.bivend.edit',compact('vendedor',
                                                                                 'vendedortipos',
                                                                                 'regionais'));
}

public function update(\App\Http\Requests\VendedorRequest $request, $id)
{

   bivend::find($id)->update($request->all());
    
    \Session::flash('mgs_sucesso',[
		      'msg'=>"VENDEDOR atualizado com sucesso!",
		      'class'=>"alert-success"	
    	]);

    	 return redirect()->route('vendedor.index');
}
	
public function destroy($id)
{

    $vendedor = bivend::find($id)->delete();

     \Session::flash('mgs_sucesso',[
        'msg'=>"VENDEDOR deletado com sucesso!",
        'class'=>"alert-success"    
        ]);

         return redirect()->route('vendedor.index');
}
public function show()
{
}

}

