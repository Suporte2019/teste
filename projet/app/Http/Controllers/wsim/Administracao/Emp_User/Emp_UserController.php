<?php

namespace App\Http\Controllers\wsim\Administracao\Emp_User;

use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\wsim\Emp_User\Emp_User;
use App\Events\Empresa\CriaEmpresa;
use App\Events\Empresa\CriaTabela;
use App\User;
use App\Models\wsim\Administracao\Empresa;


class Emp_UserController extends Controller
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
  $emp_users = DB::table('emp_user')->where('nome_empresa', 'LIKE', '%' . $request->criterio . '%')->orderBy('id', 'asc')
           ->paginate(7);
 }
 else
 {
   $emp_users = emp_user::paginate(7);
 } 

 return view ('wsim.Administracao.Emp_User.index',compact('emp_users','form'));
}

public function create()
{
  if ( Gate::denies('Adicionar') )
   return redirect()->back(); 

   $usuarios = User::all();
   $empresas = Empresa::all();


 return view ('wsim.Administracao.Emp_User.create', compact('usuarios','empresas','mysql'));
}

public function store(\App\Http\Requests\Emp_UserRequest $request)
{

  $emp_user = emp_user::create($request->all());


  \Session::flash('mgs_sucesso',[
   'msg'=>"Vinculo Empresa x Usuário adicionado com sucesso!",
   'class'=>"alert-success"	
   ]);
  return redirect()->route('emp_user.create');
}

public function edit($id)
{

  if ( Gate::denies('Editar') )
   return redirect()->back();

 $emp_user = emp_user::find($id);
 $usuarios = \App\User::all(); 


 if(!$emp_user){
   \Session::flash('mgs_erro',[
    'msg'=>"Vinculo Empresa x Usuário não existe cadastrado! Deseja cadastrar?",
    'class'=>"alert-danger"	
    ]);

   return redirect()->route('emp_user.create');
 }
 return view ('wsim.Administracao.Emp_User.edit',compact('emp_user',
                                                        'usuarios'));
}


public function update(\App\Http\Requests\Emp_UserRequest $request, $id)
{

  if ( Gate::denies('Editar') )
   return redirect()->back();

 emp_user::find($id)->update($request->all());


 \Session::flash('mgs_sucesso',[
   'msg'=>"Vinculo Empresa x Usuário atualizado com sucesso!",
   'class'=>"alert-success"	
   ]);

 return redirect()->route('emp_user.index');
}

public function destroy($id)
{

  if ( Gate::denies('Deletar') )
   return redirect()->back();

 $emp_user = emp_user::find($id)->delete();

 \Session::flash('mgs_sucesso',[
   'msg'=>"Vinculo Empresa x Usuário deletado com sucesso!",
   'class'=>"alert-success"    
   ]);

 return redirect()->route('emp_user.index');
}


}

