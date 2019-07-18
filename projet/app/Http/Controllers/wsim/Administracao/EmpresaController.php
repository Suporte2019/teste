<?php

namespace App\Http\Controllers\wsim\Administracao;

use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Events\Empresa\CriaEmpresa;
use App\Events\Empresa\CriaTabela;
use App\Models\wsim\Administracao\Empresa;



class EmpresaController extends Controller
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

  if ( Gate::denies('Painel') )
   return redirect()->back();

  // variável $form recebe do formulario para ajuste de paginação //
 $form = $request->except('_token');

 if($request)
 {
  $empresas = DB::table('empresas')->where('nome', 'LIKE', '%' . $request->criterio . '%')                               ->orderBy('id', 'asc')
                                   ->paginate(7);
 }
 else
 {
   $empresa = empresa::paginate(7);
 } 

 return view ('wsim.Administracao.Empresa.index',compact('empresas','form'));
}

public function create()
{
  if ( Gate::denies('Adicionar') )
   return redirect()->back();


 return view ('wsim.Administracao.Empresa.create');
}

public function store(\App\Http\Requests\EmpresaRequest $request)
{

  $empresa = empresa::create($request->all());

  if ($request->has('criadb'))
  
      event (new CriaEmpresa($empresa)); 
 //else

     //  event (new CriaTabela($empresa)); 

   \Session::flash('mgs_sucesso',[
   'msg'=>"EMPRESA adicionada com sucesso!",
   'class'=>"alert-success"	
   ]);
  return redirect()->route('empresa.create');
}

public function edit($id)
{

  if ( Gate::denies('Editar') )
   return redirect()->back();

 $empresa = empresa::find($id);
 

 if(!$empresa){
   \Session::flash('mgs_erro',[
    'msg'=>"EMPRESA não existe cadastrada! Deseja cadastrar?",
    'class'=>"alert-danger"	
    ]);

   return redirect()->route('empresa.create');
 }
 return view ('wsim.Administracao.Empresa.edit',compact('empresa'));
}


public function update(\App\Http\Requests\EmpresaRequest $request, $id)
{

  if ( Gate::denies('Editar') )
   return redirect()->back();

 Empresa::find($id)->update($request->all());


 \Session::flash('mgs_sucesso',[
   'msg'=>"EMPRESA atualizada com sucesso!",
   'class'=>"alert-success"	
   ]);

 return redirect()->route('empresa.index');
}

public function destroy($id)
{

  if ( Gate::denies('Deletar') )
   return redirect()->back();

 $empresa = Empresa::find($id)->delete();

 \Session::flash('mgs_sucesso',[
   'msg'=>"EMPRESA deletada com sucesso!",
   'class'=>"alert-success"    
   ]);

 return redirect()->route('empresa.index');
}

public function show($id)
{

}

}

