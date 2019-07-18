<?php

namespace App\Http\Controllers\wsim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Gate;
use App\Models\wsim\bicondpagto;


class bicondpagtoController extends Controller
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

    // variável $form recebe do formulario para ajuste de paginação //
  $form = $request->except('_token');

  if($request)
  {
   $condicaopagtos = DB::table('bi_cond_pagto')->where('nome', 'LIKE', '%' . $request->criterio . '%')                            ->orderBy('id_cond_pag', 'asc')
                                               ->paginate(7);
  }
  else
  {
   $condicaopagtos = bicondpagto::paginate(7);
  } 

  return view ('wsim.bicondpagto.index',compact('condicaopagtos','form'));
 }

 public function create()
 {

  if ( Gate::denies('Adicionar') )
   return redirect()->back();

  return view ('wsim.bicondpagto.create');
 }

 public function store(\App\Http\Requests\CondPagtoRequest $request)
 {

  bicondpagto::create($request->all());

  \Session::flash('mgs_sucesso',[
   'msg'=>"CONDIÇÃO DE PAGTO adicionada com sucesso!",
   'class'=>"alert-success"	
   ]);
  return redirect()->route('condpagto.create');
 }

 public function edit($id)
 {

  if ( Gate::denies('Editar') )
   return redirect()->back();

  $condicaopagto = bicondpagto::find($id);

  if(!$condicaopagto){
   \Session::flash('mgs_erro',[
    'msg'=>"Condição de pagto não existe cadastrada! Deseja cadastrar uma nova condição?",
    'class'=>"alert-danger"	
    ]);

   return redirect()->route('condpagto.create');
  }
  return view ('wsim.bicondpagto.edit',compact('condicaopagto'));
 }


 public function update(\App\Http\Requests\CondPagtoRequest $request, $id)
 {

  if ( Gate::denies('Editar') )
   return redirect()->back();

  bicondpagto::find($id)->update($request->all());


  \Session::flash('mgs_sucesso',[
   'msg'=>"CONDIÇÃO DE PAGTO atualizada com sucesso!",
   'class'=>"alert-success"	
   ]);

  return redirect()->route('condpagto.index');
 }

 public function destroy($id)
 {

  if ( Gate::denies('Deletar') )
   return redirect()->back();

  $condicaopagto = bicondpagto::find($id)->delete();

  \Session::flash('mgs_sucesso',[
   'msg'=>"CONDIÇÃO DE PAGTO deletada com sucesso!",
   'class'=>"alert-success"    
   ]);

  return redirect()->route('condpagto.index');
 }

public function show($id)
{

}

}

