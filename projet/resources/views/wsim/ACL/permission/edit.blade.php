<!--
 * wsim/ACL/permission/edit.blade
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

@section('content')

@section('title', 'Editar - Permissões')

@if(Session::has('mgs_sucesso'))

<div class="container">
 <div class="row">
  <div class="col-md-9 col-md-offset-1">
   <div align="center" class="alert {{ Session::get('mgs_sucesso')['class']}}">
    <a class="close" data-dismiss="alert">&times;</a>
    {{ Session::get('mgs_sucesso')['msg']}}

   </div>
  </div>
 </div>
</div>
@endif
 
 <div class="container">
  <div class="row">
   <div class="col-md-11">
    <div class="panel panel-default">

     <ol class="breadcrumb panel-heading">
      <li><a href="{{route('home')}}">Home</a></li>
      <li><a href="{{route('permissao.index')}}">Permissão</a></li>
      <li class="active">Editar</li>
     </ol>

     <!--div class="panel-body"-->

      <form class="form-horizontal" action="{{ route ('permissao.update',$permission->id )}}" method="post">
       {{ csrf_field() }}
       <input type="hidden" name="_method" value="put">

       <!--div class="form-group">
        <label class="col-sm-2 control-label" for="id">ID:</label>
        <div class="col-sm-1">
         <input class="form-control" name="id" type="text" disabled value="{{$permission->id}}"> 
        </div>
       </div-->

       <div class="form-group">
        <label class="col-sm-2 control-label" for="id">Código:</label>
        <div class="col-sm-1">
         <input class="form-control" name="id" type="text" readonly value="{{$permission->id}}">
        </div>
       </div>

       <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
        <label class="col-sm-2 control-label" for="nome">Nome:</label>
        <div class="col-sm-5">     
         <input class="form-control" type="text" name="nome" value="{{$permission->nome}}">
          @if ($errors->has('nome'))
       <span class="help-block">
        <strong>{{ $errors->first('nome') }}</strong>
       </span>
       @endif
        </div> 
       </div>

       <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
        <label class="col-sm-2 control-label" for="descricao">Descrição:</label>
        <div class="col-sm-5">     
         <input class="form-control" type="text" name="descricao" value="{{$permission->descricao}}">
          @if ($errors->has('descricao'))
       <span class="help-block">
        <strong>{{ $errors->first('descricao') }}</strong>
       </span>
       @endif
        </div> 
       </div>
       <br />

       <div class="row">
        <div class="col-md-12">
         <div class="panel-footer">  
         <button type="submit" class="btn btn-default btn-sm">                    
         <i class="fa fa-save" style="color:green;"></i> Salvar
         </button>

         <a class="btn btn-default btn-sm" href="{{ route('permissao.index')}}">
         <i class="fa fa-list" style="color:blue;"></i> Listar </a>
        </div>
       </div> 
       </div>

      </form>
     <!--/div-->

    </div>
   </div>
  </div>
 </div>
</div>
@endsection