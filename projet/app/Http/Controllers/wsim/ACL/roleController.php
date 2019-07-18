<?php

namespace App\Http\Controllers\wsim\ACL;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Gate;
use App\Models\wsim\ACL\Role;
use App\Models\wsim\ACL\Permission;



class roleController extends Controller
{

  private $role;

  public function __construct (Role $role)
  {
        $this->role = $role;

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
   $roles = DB::table('roles')->where('nome', 'LIKE', '%' . $request->criterio . '%')
                              ->orderBy('nome', 'asc')
                              ->paginate(7);
  }
  else
  {
   $roles = role::paginate(7);
  } 

  return view ('wsim.ACL.role.index',compact('roles','form'));
 }

 public function create()
 {

  if ( Gate::denies('Painel') )
     return redirect()->back();

  $permissions = Permission::all(); 

  return view ('wsim.ACL.role.create',compact('permissions'));
 }

 public function store(\App\Http\Requests\roleRequest $request)
 {

  if ( Gate::denies('Painel') )
        return redirect()->back();
        
  $dados = $request->all();
  $role  = Role::create($dados);
  $role  = Role::find($role->id);
  $role->permissions()->attach($dados['permission_id']);

  \Session::flash('mgs_sucesso',[
   'msg'=>"GRUPO adicionado com sucesso!",
   'class'=>"alert-success"	
   ]);
  return redirect()->route('grupo.create');
 }

 public function edit($id)
 {

  if ( Gate::denies('Painel') )
        return redirect()->back();

  $permissions = Permission::all(); 
  $role        = Role::find($id);


  if(!$role){
   \Session::flash('mgs_erro',[
    'msg'=>"GRUPO não existe cadastrado! Deseja cadastrar um novo GRUPO?",
    'class'=>"alert-danger"	
    ]);

   return redirect()->route('grupo.create');
  }

  return view ('wsim.ACL.role.edit',compact('role','permissions'));
 }

 public function update(\App\Http\Requests\roleRequest $request, $id)
 {

  if ( Gate::denies('Painel') )
        return redirect()->back();

  $role  = role::find($id);
  $dados = $request->all();
  $role->update($dados);
  $role->permissions()->sync($dados['permission_id']);

  \Session::flash('mgs_sucesso',[
   'msg'=>"GRUPO atualizado com sucesso!",
   'class'=>"alert-success"	
   ]);

  return redirect()->route('grupo.index');
 }

 public function destroy($id)
 {

  //$role = \App\Models\wsim\ACL\role::find($id);

  //if(DB::table('permission_role')->
  //where('role_id', $id)->count()){
  // $msg = "Não é possível excluir o GRUPO. 
  // As permissiões de ID => ( ";
  /// $permissions = DB::table('permission_role')->
   // where('role_id', $id)->get();
   // foreach($permissions as $permission){
  //   $msg .= $permission->permission_id." ";
  // }
  // $msg .= " ) estão relacionados a ao GRUPO";
  //  \Session::flash('mensagem', ['msg'=>$msg]);
  //  return redirect()->route('role.lista', $id);
  //}
  
  if ( Gate::denies('Painel') )
        return redirect()->back();

  $role = role::find($id)->delete();

  \Session::flash('mgs_sucesso',[
   'msg'=>"GRUPO deletado com sucesso!",
   'class'=>"alert-success"    
   ]);

  return redirect()->route('grupo.index');
 }

public function filtrapermission($id)
 {

  if ( Gate::denies('Painel') )
        return redirect()->back();

  $role = role::find($id);

 //recupera todas permissiões viculadas a role //
  $permissions = $role->permissions()->paginate(10);

  return view ('wsim.ACL.permission.index',compact('role', 
                                                   'permissions'));

 }

public function filtrauser($id)
 {

  if ( Gate::denies('Painel') )
        return redirect()->back();

  $role = role::find($id);

 //recupera todas permissiões viculadas a role //
  $users = $role->user()->paginate(10);


  return view ('wsim.Administracao.users.index',compact('role', 
                                                        'users'));

 }

 public function show($id)
 {
 }


}

