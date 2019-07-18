<!--
 * users/edit.blade
 *
 * @version    1.0
 * @package    control
 * @subpackage BI
 * @author     FRDI
 * @copyright  Copyright (c) 2018 FRDI
 * @license    FRDI

 ************************************************************************
-->

@extends('adminlte::page')

@section('title', 'Editar - Pessoa')

    @section('content')
    <div class="container">
     <div class="row">
      <div class="col-md-11">
       <div class="panel panel-default">

        <ol class="breadcrumb panel-heading">
         <li><a href="{{route('home')}}">Home</a></li>
         <li><a href="{{route('pessoa.index')}}">Pessoa</a></li>
         <li class="active">Editar</li>
       </ol>
      
       <!--div class="panel-body"-->
       
         <form class="form-horizontal" action="{{ route ('pessoa.update',$pessoa->id )}}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="put">
          
          <!--div class="form-group">
           <label class="col-sm-2 control-label" for="id">ID:</label>
           <div class="col-sm-1">
            <input class="form-control" name="id" type="text" disabled value="{{$pessoa->id}}"> 
           </div>
         </div-->


         <div class="form-group">
           <label class="col-sm-2 control-label" for="id_pessoa">Código:</label>
           <div class="col-sm-1">
            <input class="form-control" name="id_pessoa" type="text" readonly value="{{$pessoa->id_pessoa}}">
          </div>
        </div>

        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
         <label class="col-sm-2 control-label" for="nome">Nome:</label>
         <div class="col-sm-6">     
          <input class="form-control" type="text" name="nome"  placeholder="Nome" value="{{$pessoa->nome}}">
          @if ($errors->has('nome'))
          <span class="help-block">
            <strong>{{ $errors->first('nome') }}</strong>
          </span>
          @endif
        </div> 
      </div>

      <div class="form-group {{ $errors->has('cidade') ? 'has-error' : '' }}">
       <label class="col-sm-2 control-label" for="cidade">Cidade:</label>
       <div class="col-sm-3">     
        <input class="form-control" type="text" name="cidade"  placeholder="Cidade" value="{{$pessoa->cidade}}">
        @if ($errors->has('cidade'))
          <span class="help-block">
            <strong>{{ $errors->first('cidade') }}</strong>
          </span>
          @endif
      </div> 
      <label class="col-sm-1 control-label" for="uf">UF:</label>
      <div class="col-sm-2">
        <select class="form-control" name="uf">
         @foreach($ufs as $uf)
         <option value="{{$uf->uf}}"
          {{(isset($pessoa->uf) && $pessoa->uf == $uf->uf ?
          'selected' : '')}} > {{$uf->uf}}
        </option>
        @endforeach
      </select>
      </div> 
  </div>

  <div class="form-group {{ $errors->has('id_vend') ? 'has-error' : '' }}">
   <label class="col-sm-2 control-label" for="id_vend">Vendedor:</label>
   <div class="col-sm-6">
    <select class="form-control" name="id_vend">
     @foreach($vendedores as $vendedor)
     <option value="{{$vendedor->id_vend}}"
      {{(isset($pessoa->id_vend) && $pessoa->id_vend == $vendedor->id_vend ?
      'selected' : '')}} > {{$vendedor->nome}}
    </option>
    @endforeach
  </select>     
 </div> 
 </div>

 <div class="form-group {{ $errors->has('id_regiao') ? 'has-error' : '' }}">
   <label class="col-sm-2 control-label" for="nome">Região:</label>
   <div class="col-sm-6"> 
    <select class="form-control" name="id_regiao">
     @foreach($regioes as $regiao)
     <option value="{{$regiao->id_regiao}}"
      {{(isset($pessoa->id_regiao) && $pessoa->id_regiao == $regiao->id_regiao ?
      'selected' : '')}} > {{$regiao->nome}}
    </option>
    @endforeach
  </select>
 </div> 
 </div>

 <div class="form-group {{ $errors->has('id_categ') ? 'has-error' : '' }}">
   <label class="col-sm-2 control-label" for="nome">Categoria:</label>
   <div class="col-sm-6">     
    <select class="form-control" name="id_categ">
     @foreach($categorias as $categoria)
     <option value="{{$categoria->id_categ}}"
      {{(isset($pessoa->id_categ) && $pessoa->id_categ == $categoria->id_categ ?
      'selected' : '')}} > {{$categoria->nome}}
    </option>
    @endforeach
  </select>
  
 </div> 
 </div>

 <div class="form-group {{ $errors->has('ativo') ? 'has-error' : '' }}">
   <label class="col-sm-2 control-label" for="nome">Ativo:</label>
   <div class="col-sm-2"> 
     <select class="form-control" name="ativo">
      <option value="{{$pessoa->ativo}}" selected>{{$pessoa->ativo}}</option>
      <option>S</option>
      <option>N</option>
    </select>               
  </div>
  <label class="col-sm-1 control-label" for="dt_alt">Data:</label>
  <div class="col-sm-3">
    <input class="form-control" name="dt_alt" type="text" 
    value="{{now()}}" readonly>
  </div>
 </div>

 <br />

  <div class="row">
     <div class="col-md-12">
       <div class="panel-footer"> 
        <button type="submit" class="btn btn-default btn-sm">                   
         <i class="fa fa-save" style="color:green;"></i> Salvar
       </button>
       <a class="btn btn-default btn-sm" href="{{ route('pessoa.index')}}">
         <i class="fa fa-list" style="color:blue;"></i> Listar</a>
       </div>
     </div>
   </div> 

 </form>
 <!--/div-->
 </div>
 </div>
 </div>
 </div>
 @endsection