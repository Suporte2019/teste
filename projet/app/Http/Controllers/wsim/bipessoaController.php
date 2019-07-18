<?php

namespace App\Http\Controllers\wsim;

 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\DB;
 use App\Http\Controllers\Controller;
 use App\Models\wsim\bipessoa;



 class bipessoaController extends Controller
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
       $pessoas = DB::table('bi_pessoa')->where('nome', 'LIKE', '%' . $request->criterio . '%')
                                                                  ->orderBy('id_pessoa', 'asc')
                                                                  ->paginate(7);
            }
     else
     {
       $pessoas = bipessoa::paginate(7);
     } 
     
 	return view ('wsim.bipessoa.index',compact('pessoas','form'));
 }

 public function create()
 {

     $ufs = \App\Models\wsim\biuf::all();
     $categorias = \App\Models\wsim\bicateg::all();
     $regioes = \App\Models\wsim\biregiao::all();
     $vendedores = \App\Models\wsim\bivend::all();

 	return view ('wsim.bipessoa.create', compact('ufs',
                                               'categorias',
                                               'regioes',
                                               'vendedores'));
 }

 public function store(\App\Http\Requests\PessoaRequest $request)
 {

    bipessoa::create($request->all());

     \Session::flash('mgs_sucesso',[
 		'msg'=>"PESSOA adicionada com sucesso!",
 		'class'=>"alert-success"	
     	]);
 	return redirect()->route('pessoa.create');
 }

 public function edit($id)
 {

     $pessoa = bipessoa::find($id);

     $ufs = \App\Models\wsim\biuf::all();
     $categorias = \App\Models\wsim\bicateg::all();
     $regioes = \App\Models\wsim\biregiao::all();
     $vendedores = \App\Models\wsim\bivend::all();
    
     if(!$pessoa){
     	 \Session::flash('mgs_erro',[
 		'msg'=>"Pessoa não existe cadastrada! Deseja cadastrar uma nova pessoa?",
 		'class'=>"alert-danger"	
     	]);

     	 return redirect()->route('pessoa.create');
     }
 	return view ('wsim.bipessoa.edit',compact('pessoa',
                                            'ufs',
                                            'categorias',
                                            'regioes',
                                            'vendedores'));
 }


 public function update(\App\Http\Requests\PessoaRequest $request, $id)
 {

     bipessoa::find($id)->update($request->all());
     
     	 \Session::flash('mgs_sucesso',[
 		'msg'=>"PESSOA atualizada com sucesso!",
 		'class'=>"alert-success"	
     	]);

     	 return redirect()->route('pessoa.index');
 }
 	
 public function destroy($id)
 {

     $pessoa = bipessoa::find($id)->delete();

    // $pessoa->delete();

      \Session::flash('mgs_sucesso',[
         'msg'=>"PESSOA deletada com sucesso!",
         'class'=>"alert-success"    
         ]);

          return redirect()->route('pessoa.index');
 }
 public function show($id)
 {

 }

 }

