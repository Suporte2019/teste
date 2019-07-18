<?php

namespace App\Http\Controllers\wsim\Administracao\Log;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Gate;
use App\Models\wsim\Administracao\Log\log_acesso;


class log_acessoController extends Controller
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
   $log_acessos = DB::table('log_acessos')->where('nome', 'LIKE', '%' . $request->criterio . '%')
                                          ->orderBy('id', 'asc')
                                          ->paginate(7);
 }
 else
 {
   $log_acessos = log_acesso::paginate(7);
 }  


		return view('wsim.Administracao.Log.index',compact('log_acessos','form'));
	}

public function destroy($id)
{

  if ( Gate::denies('Deletar') )
   return redirect()->back();

 $log_acesso = log_acesso::find($id)->delete();

 
 \Session::flash('mgs_sucesso',[
   'msg'=>"LOG DE ACESSO deletada com sucesso!",
   'class'=>"alert-success"    
   ]);

 return redirect()->route('log_acesso.index');
}

 
}
