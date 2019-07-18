<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Hash;
use Gate;
use App\Models\wsim\ACL\Role;
use App\Models\wsim\ACL\Permission;
use App\Models\wsim\ACL\permission_role;
use App\Models\wsim\Administracao\Empresa;
use App\User;



class userController extends Controller
{

  private $user;

  public function __construct (User $user)
  {
    $this->user = $user;

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
      $users = DB::table('users')->where('name', 'LIKE', '%' . $request->criterio . '%')->orderBy('id', 'asc')->paginate(7);
    }
    else
    {
      $users = user::paginate(7);


    } 


    return view ('wsim.Administracao.users.index',compact('users','form'));
  }

  public function create()
  {

    if ( Gate::denies('Painel') )
      return redirect()->back();

 
    $empresas = Empresa::all();
    $roles = Role::orderBy('nome', 'ASC')->get();

    return view ('wsim.Administracao.users.create',compact('roles',
                                                           'empresas'));
  }

  public function store(\App\Http\Requests\UserRequest $request)
  {

   if ( Gate::denies('Painel') )
    return redirect()->back();

dd($request);

  $dados = $request->all();
  //$user = user::create($dados);
  $user = User::create([
                        'name'    => $dados['name'],
                        'email'   => $dados['email'],
                        'tipo'    => $dados['tipo'],
                        'empresa' => $dados['empresa'],
                        'status'  => $dados['status'],
                        'password'=> Hash::make($dados['password'])]);
  $user = user::find($user->id);
  $user->roles()->attach($dados['role_id']);


  \Session::flash('mgs_sucesso',[
    'msg'=>"USUÁRIO adicionado com sucesso!",
    'class'=>"alert-success"	
    ]);
  return redirect()->route('usuario.create');
}

public function edit($id)
{

 if ( Gate::denies('Painel') )
  return redirect()->back();

$roles = Role::orderBy('nome', 'ASC')->get();
$user = User::find($id);
$empresas = Empresa::all();



if(!$user){
  \Session::flash('mgs_erro',[
   'msg'=>"USUÁRIO não existe cadastrado! Deseja cadastrar um nova USUÁRIO?",
   'class'=>"alert-danger"	
   ]);

  return redirect()->route('usuario.create');
}
return view ('wsim.Administracao.users.edit',compact('user',
                                                     'roles',
                                                      'empresas'));
}


public function update(Request $request, $id)
{



  if ( Gate::denies('Painel') )
    return redirect()->back();

  $user  = User::find($id);

  $dados = $request->all();
  
  // Se senha "em branco" mantem a senha atual, se inserida NOVA Atualiza.//
  if(!$dados['password']){
        $senha_atual = $user->password;
        $dados['password'] = $senha_atual;
        $user->update($dados);

}else


  $user->update([
                 'name'     => $dados['name'],
                 'email'    => $dados['email'],
                 'tipo'     => $dados['tipo'],
                 'empresa'  => $dados['empresa'],
                 'status'   => $dados['status'],
                 'password' => Hash::make($dados['password'])]);
  

  $user->roles()->sync($dados['role_id']);


  \Session::flash('mgs_sucesso',[
    'msg'=>"USUÁRIO atualizado com sucesso!",
    'class'=>"alert-success"	
    ]);


  return redirect()->route('usuario.index');
}

public function destroy($id)
{

  //  if(DB::table('role_user')->
  //where('user_id', $id)->count()){
  // $msg = "Não é possível excluir o USUÁRIO. 
  // Os GRUPOS de ID => ( ";
  // $roles = DB::table('role_user')->
  //  where('user_id', $id)->get();
  //  foreach($roles as $role){
  //   $msg .= $role->role_id." ";
  // }
  // $msg .= " ) estão relacionados a ao USUÁRIO!";
  //  \Session::flash('mensagem', ['msg'=>$msg]);
  //  return redirect()->route('user.lista', $id);
  //}
  if ( Gate::denies('Painel') )
    return redirect()->back();

  $user = user::find($id)->delete();

   //$user->delete();

  \Session::flash('mgs_sucesso',[
    'msg'=>"USUÁRIO deletado com sucesso!",
    'class'=>"alert-success"    
    ]);

  return redirect()->route('usuario.index');
}

public function filtrarole($id)
{

  if ( Gate::denies('Painel') )
    return redirect()->back();

  //recupera o usuario //
  $user = user::find($id);

  //recupera todas roles viculadas ao usuario //
  $roles = $user->roles()->paginate(10);



  return view ('wsim.ACL.role.index',compact('user', 
                                             'roles'));


}

public function userpermission($id)
{


$user = User::with('roles.permissions')->find($id);

$roles = $user->roles;

/*$permissions = [];
foreach ($roles as $role) {
    foreach ($role->permissions as $permission) {
       array_push($permissions, $permission);
    }
    
  }
*/







  return view ('wsim.ACL.permission.index',compact('user',
                                                   'permisisons'));

}



public function show($id)
{

}

}

