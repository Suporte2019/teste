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

@section('title', 'Editar - Usuário')

@section('content')
<div class="container">
 <div class="row">
  <div class="col-md-11">
   <div class="panel panel-default">

    <ol class="breadcrumb panel-heading">
     <li><a href="{{route('home')}}">Home</a></li>
     <li><a href="{{route('usuario.index')}}">Usuário</a></li>
     <li class="active">Editar</li>
   </ol>

   <!--div class="panel-body"-->

   <form class="form-horizontal" action="{{ route ('usuario.update',$user->id )}}" method="post">
     {{ csrf_field() }}
     <input type="hidden" name="_method" value="put">


     <div class="form-group">
      <label class="col-sm-2 control-label" for="id">Código:</label>
      <div class="col-sm-1">
       <input class="form-control" name="id" type="text" readonly value="{{$user->id}}">
     </div>
   </div>

   <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label" for="name">Nome:</label>
    <div class="col-sm-5">     
     <input class="form-control" type="text" name="name" placeholder="Nome" value="{{$user->name}}">
     @if ($errors->has('name'))
     <span class="help-block">
      <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
  </div> 
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
  <label class="col-sm-2 control-label" for="email">E-mail:</label>
  <div class="col-sm-5">     
   <input class="form-control" type="email" name="email"  placeholder="email" value="{{$user->email}}">
   @if ($errors->has('email'))
   <span class="help-block">
    <strong>{{ $errors->first('email') }}</strong>
  </span>
  @endif
</div> 
</div>

<div class="form-group">
  <label class="col-sm-2 control-label" for="password">Nova Senha:</label>
  <div class="col-sm-2">     
   <input class="form-control" type="password" name="password"  value="">
   
   <span class="help-block">
     
   </span>
   
 </div> 
 <label class="col-sm-1 control-label" for="email">Tipo:</label>
 <div class="col-sm-2">     
   <input class="form-control" type="text" name="tipo"  placeholder="Tipo" value="{{$user->tipo}}">
 </div> 

</div>

     <!--div class="form-group">
      
     </div-->

     
     <div class="form-group {{ $errors->has('empresa') ? 'has-error' : '' }}">
      <label class="col-sm-2 control-label" for="empresa">Empresa:</label>
      <div class="col-sm-5">    
       <select class="form-control" name="empresa">
        @foreach($empresas as $empresa)
        <option value="{{$empresa->nome}}"
         {{(isset($user->empresa) && $user->empresa == $empresa->nome ?
          'selected' : '')}}> {{$empresa->nome}}
        </option>
        @endforeach
      </select>

    </div> 
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label" for="status">Situação:</label>
    
    
    <div class="col-sm-2">    
      <label class="radio-inline">
        <input type="radio" name="status" value="1" {{ $user->status == '1' ? 'checked' : ''}}> <spam class="label label-success">ATIVO</spam>
      </label>
      <label class="radio-inline">
        <input type="radio" name="status" value="0" {{ $user->status == '0' ? 'checked' : ''}}> <spam class="label label-danger">INATIVO</spam>
      </label> 
    </div> 
    
  </div>
  


      <!--div class="form-group">
       <label class="col-sm-2 control-label" >GRUPO:</label>
      
      @foreach($roles as $role)  

      <div class="col-sm-2">
       <input type="checkbox" name="role_id[]" value="{{ $role->id }}"
       @foreach($user->roles as $r) 
       {{$role->id == $r->id ? 'checked' : ''}}
       @endforeach>
       {{$role->nome}}
      </br>
      </div>
      @endforeach 
    </div-->

    <div class="form-group">
      <label class="col-sm-2 control-label" >GRUPO:</label>
    </div> 

    <hr/>

    @foreach($roles as $role)  

    <div class="col-sm-2">
      <input type="checkbox" name="role_id[]" value="{{ $role->id }}"
      @foreach($user->roles as $r) 
      {{$role->id == $r->id ? 'checked' : ''}}
      @endforeach>
      {{$role->nome}}
    </br>
  </br>
</div>
@endforeach 

</br>

<div class="row">
 <div class="col-md-12"> 
  <div class="panel-footer"> 
   <button type="submit" class="btn btn-default btn-sm">                   
    <i class="fa fa-save" style="color:green;"></i> Salvar
  </button>

  <a class="btn btn-default btn-sm" href="{{ route('usuario.index')}}">
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