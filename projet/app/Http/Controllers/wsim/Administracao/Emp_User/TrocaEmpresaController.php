<?php

namespace App\Http\Controllers\wsim\Administracao\Emp_User;

 
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\DB;
 use App\Http\Controllers\Controller;
 use App\Models\wsim\Emp_User\Emp_User;
 use App\empresa\ConectaEmpresa;


 class trocaempresaController extends Controller
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


     public function lista(Request $request)
     {

      $usario_logado = auth()->user()->email;

      //$empresas = DB::table('empresas')
                                //->select('db_database', 'usuario')
                                //->where('usuario',  $usariologado)
                                //->get();

     $emp_users = DB::connection('adm_empresas')->table('emp_user')
                                //->select('db_database', 'usuario')
                                ->where('usuario',  $usario_logado)
                                ->get();


      return view ('wsim.Administracao.TrocaEmpresa.lista', compact('emp_users'));
    }

    public function conecta(Request $request)
     {

      $user = auth()->user();

      $empresa = $request->db_database;

          
      $tenan = DB::connection('adm_empresas')->table('emp_user')
                                    ->where('db_database',  $empresa)
                                    ->where('usuario', auth()->user()->email)
                                    ->first();
              

     session(['empresaSelecionada' => $tenan,]);
          

      //return view ('wsim.Administracao.TrocaEmpresa.lista');
     return redirect()->route('home');
    }
     
    
  }

