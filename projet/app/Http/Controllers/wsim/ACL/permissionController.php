<?php

namespace App\Http\Controllers\wsim\ACL;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\DB;
  use App\Http\Controllers\Controller;
  use Gate;
  use App\Models\wsim\ACL\Permission;



  class permissionController extends Controller
  {

    private $permission;

    public function __construct (Permission $permission)
    {
      $this->permission = $permission;

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
          $permissions = DB::table('permissions')->where('nome', 'LIKE', '%' . $request->criterio . '%')->orderBy('nome', 'asc')
          ->paginate(7);
        }
        else
        {
          $permissions = permission::paginate(7);
        } 

        return view ('wsim.ACL.permission.index',compact('permissions','form'));
      }

      public function create()
      {

       if ( Gate::denies('Painel') )
        return redirect()->back();   
      
      return view ('wsim.ACL.permission.create');
    }

    public function store(\App\Http\Requests\PermissionRequest $request)
    {

      Permission::create($request->all());

      \Session::flash('mgs_sucesso',[
        'msg'=>"PERMISSÃO adicionada com sucesso!",
        'class'=>"alert-success"	
      ]);

      return redirect()->route('permissao.create');
    }

    public function edit($id)
    {

      if ( Gate::denies('Painel') )
        return redirect()->back();

      $permission = Permission::find($id);

      if(!$permission){
        \Session::flash('mgs_erro',[
          'msg'=>"PERMISSÃO não existe cadastrada! Deseja cadastrar um nova PERMISSÃO?",
          'class'=>"alert-danger"	
        ]);

        return redirect()->route('permissao.create');
      }
      return view ('wsim.ACL.permission.edit',compact('permission'));
    }


    public function update(\App\Http\Requests\PermissionRequest $request, $id)
    {

      if ( Gate::denies('Painel') )
        return redirect()->back();

      Permission::find($id)->update($request->all());
     
     
      \Session::flash('mgs_sucesso',[
        'msg'=>"PERMISSÃO atualizada com sucesso!",
        'class'=>"alert-success"	
      ]);     

      return redirect()->route('permissao.index');
    }

    public function destroy($id)
    {

      if ( Gate::denies('Painel') )
        return redirect()->back();

      $permission = Permission::find($id)->delete();

      \Session::flash('mgs_sucesso',[
        'msg'=>"PERMISSÃO deletada com sucesso!",
        'class'=>"alert-success"    
      ]);

      return redirect()->route('permissao.index');
    }

    public function filtrarole($id)
    {

      if ( Gate::denies('Painel') )
        return redirect()->back();

      $permission = Permission::find($id);

   //recupera todas permissiões viculadas a role //
      $roles = $permission->roles()->paginate(10);

      return view ('wsim.ACL.role.index',compact('permission', 
       'roles'));


    }

    public function show($id)
    {

    }



  }

