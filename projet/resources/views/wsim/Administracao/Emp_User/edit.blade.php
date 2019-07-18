<!--
 * wsim/Administracao/Emp_User/edit.blade
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

@section('title', 'Editar - Empresa x Usuário')

@section('content')
<div class="container">
 <div class="row">
  <div class="col-md-11">
   <div class="panel panel-default">

    <ol class="breadcrumb panel-heading">
     <li><a href="{{route('home')}}">Home</a></li>
     <li><a href="{{route('emp_user.index')}}">Usuário</a></li>
     <li class="active">Editar</li>
   </ol>

   <!--div class="panel-body"-->

   <form class="form-horizontal" action="{{ route ('emp_user.update',$emp_user->id )}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="put">


    <div class="form-group">
     <label class="col-sm-2 control-label" for="name">Código:</label>
     <div class="col-sm-1">     
      <input class="form-control" type="text" name="nome" readonly value="{{$emp_user->id}}">
    </div> 
  </div>

  <div class="form-group {{ $errors->has('nome_empresa') ? 'has-error' : '' }}">
   <label class="col-sm-2 control-label" for="nome_empresa">Empresa:</label>
   <div class="col-sm-5">     
    <input class="form-control" type="text" name="nome_empresa" value="{{$emp_user->nome_empresa}}">
    @if ($errors->has('nome_empresa'))
    <span class="help-block">
      <strong>{{ $errors->first('nome_empresa') }}</strong>
    </span>
    @endif
  </div> 
</div>


<div class="form-group {{ $errors->has('db_database') ? 'has-error' : '' }}">
 <label class="col-sm-2 control-label" for="db_database">DB_Name:</label>
 <div class="col-sm-5">     
  <input class="form-control" type="text" name="db_database"  value="{{$emp_user->db_database}}">
  @if ($errors->has('db_database'))
  <span class="help-block">
    <strong>{{ $errors->first('db_database') }}</strong>
  </span>
  @endif
</div> 
</div>

<div class="form-group {{ $errors->has('db_hostname') ? 'has-error' : '' }}">
 <label class="col-sm-2 control-label" for="db_hostname">DB_Host:</label>
 <div class="col-sm-5">     
  <input class="form-control" type="text" name="db_hostname"  value="{{$emp_user->db_hostname}}">
  @if ($errors->has('db_hostname'))
  <span class="help-block">
    <strong>{{ $errors->first('db_hostname') }}</strong>
  </span>
  @endif
</div> 
</div>

<div class="form-group {{ $errors->has('db_username') ? 'has-error' : '' }}">
 <label class="col-sm-2 control-label" for="db_hostname">DB_User:</label>
 <div class="col-sm-5">     
  <input class="form-control" type="text" name="db_username"  value="{{$emp_user->db_username}}">
  @if ($errors->has('db_user'))
  <span class="help-block">
    <strong>{{ $errors->first('db_user') }}</strong>
  </span>
  @endif
</div> 
</div>

<div class="form-group {{ $errors->has('db_password') ? 'has-error' : '' }}">
 <label class="col-sm-2 control-label" for="db_hostname">Senha:</label>
 <div class="col-sm-5">     
  <input class="form-control" type="password" name="db_password"  value="{{$emp_user->db_password}}">
  @if ($errors->has('db_password'))
  <span class="help-block">
    <strong>{{ $errors->first('db_password') }}</strong>
  </span>
  @endif
</div> 
</div>
        <!--div class="form-group {{ $errors->has('usuario') ? 'has-error' : '' }}">
       <label class="col-sm-2 control-label" for="usuario">Usuário:</label>
       <div class="col-sm-5">     
        <input class="form-control" type="email" name="usuario"  value="{{$emp_user->usuario}}">
       </div> 
     </div-->

     <div class="form-group {{ $errors->has('usuario') ? 'has-error' : '' }}">
      <label class="col-sm-2 control-label" for="usuario">Usuário:</label>
      <div class="col-sm-5">    
        <select class="form-control" name="usuario">
         @foreach($usuarios as $usuario)
         <option value="{{$usuario->email}}"
          {{(isset($emp_user->usuario) && $emp_user->usuario == $usuario->email ?
            'selected' : '')}} > {{$usuario->email}}
          </option>
          @endforeach
        </select>
        @if ($errors->has('usuario'))
        <span class="help-block">
          <strong>{{ $errors->first('usuario') }}</strong>
        </span>
        @endif                 
      </div> 
    </div>

      <!--div class="form-group">
       <label class="col-sm-2 control-label" for="db_hostname">Validade:</label>
       <div class="col-sm-5">     
        <input class="form-control" type="date" name="validade"  value="{{$emp_user->validade}}">
       </div> 
     </div-->

   </br>

   <div class="row">
     <div class="col-md-12">
       <div class="panel-footer"> 
        <button type="submit" class="btn btn-default btn-sm">                   
         <i class="fa fa-save" style="color:green;"></i> Salvar
       </button>
       <a class="btn btn-default btn-sm" href="{{ route('emp_user.index')}}">
         <i class="fa fa-list" style="color:blue" ></i> Listar</a>
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