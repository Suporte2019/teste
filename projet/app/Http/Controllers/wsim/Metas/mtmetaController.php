<?php

namespace App\Http\Controllers\wsim\Metas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Gate;


class mtmetaController extends Controller
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

  if ( Gate::denies('Listar') )
   return redirect()->back();

 /* variável $form recebe do formulario para ajuste de paginação //
 $form = $request->except('_token');

 if($request)
 {
   $metas = DB::table('bi_categ')->where('nome', 'LIKE', '%' . $request->criterio . '%')
                                                               ->orderBy('id', 'asc')
                                                               ->paginate(7);
 }
 else
 {
   $metas = bicateg::paginate(7);
 } 

 return view ('wsim.bicateg.index',compact('metas','form'));

*/
 return view ('wsim.METAS.mtmetas.index');
}

/*

public function create()
{
  if ( Gate::denies('Adicionar') )
   return redirect()->back();  


 return view ('wsim.Metas.mtmetas.create');
}

public function store(\App\Http\Requests\CategoriaRequest $request)
{

  bicateg::create($request->all());

  \Session::flash('mgs_sucesso',[
   'msg'=>"CATEGORIA Adicionada com sucesso!",
   'class'=>"alert-success"	
   ]);
  return redirect()->route('categoria.index');
}

public function edit($id)
{

  if ( Gate::denies('Editar') )
   return redirect()->back();

 $categoria = bicateg::find($id);

 if(!$categoria){
   \Session::flash('mgs_erro',[
    'msg'=>"Categoria não existe cadastrada! Deseja cadastrar uma nova categoria?",
    'class'=>"alert-danger"	
    ]);

   return redirect()->route('categoria.create');
 }
 return view ('wsim.bicateg.edit',compact('categoria'));
}


public function update(\App\Http\Requests\CategoriaRequest $request, $id)
{

  if ( Gate::denies('Editar') )
   return redirect()->back();

 bicateg::find($id)->update($request->all());


 \Session::flash('mgs_sucesso',[
   'msg'=>"CATEGORIA atualizada com sucesso!",
   'class'=>"alert-success"	
   ]);

 return redirect()->route('categoria.index');
}

public function destroy($id)
{

  if ( Gate::denies('Deletar') )
   return redirect()->back();

 $categoria = bicateg::find($id)->delete();

 
 \Session::flash('mgs_sucesso',[
   'msg'=>"CATEGORIA deletada com sucesso!",
   'class'=>"alert-success"    
   ]);

 return redirect()->route('categoria.index');
}

public function show($id)
{


}

*/

}

