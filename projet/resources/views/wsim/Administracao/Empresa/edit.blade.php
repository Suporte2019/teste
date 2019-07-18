 <!--
  * wsim/Administracao/Empresa/edit.blade
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

 @section('title', 'Editar - Empresa')

 @section('content')
 <div class="container">
   <div class="row">
    <div class="col-md-11">
     <div class="panel panel-default">

      <ol class="breadcrumb panel-heading">
       <li><a href="{{route('home')}}">Home</a></li>
       <li><a href="{{route('empresa.index')}}">Empresa</a></li>
       <li class="active">Editar</li>
     </ol>

     <!--div class="panel-body"-->

     <form class="form-horizontal" action="{{ route ('empresa.update',$empresa->id )}}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="put">

      <div class="form-group">
       <label class="col-sm-2 control-label" for="id">Código:</label>
       <div class="col-sm-1">
        <input class="form-control" name="id" type="text" readonly value="{{$empresa->id}}">
      </div>
    </div>

    <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
     <label class="col-sm-2 control-label" for="nome">Nome:</label>
     <div class="col-sm-5">     
       <input class="form-control" type="text" name="nome" value="{{$empresa->nome}}" >
        @if ($errors->has('nome'))
       <span class="help-block">
        <strong>{{ $errors->first('nome') }}</strong>
       </span>
       @endif
     </div> 
   </div>

   <div class="form-group {{ $errors->has('cnpj') ? 'has-error' : '' }}">
     <label class="col-sm-2 control-label" for="cnpj">CNPJ:</label>
     <div class="col-sm-5">     
       <input class="form-control" type="text" name="cnpj" id="cnpj" value="{{$empresa->cnpj}}" >
        @if ($errors->has('cnpj'))
       <span class="help-block">
        <strong>{{ $errors->first('cnpj') }}</strong>
       </span>
       @endif
     </div> 
   </div>

   <div class="form-group">
     <label class="col-sm-2 control-label" for="razao">Razão:</label>
     <div class="col-sm-5">     
       <input class="form-control" type="text" name="razao" value="{{$empresa->razao}}" >
     </div> 
   </div>

   <div class="form-group">
     <label class="col-sm-2 control-label" for="endereco">Endereço:</label>
     <div class="col-sm-5">     
       <input class="form-control" type="text" name="endereco" value="{{$empresa->endereco}}" >
     </div> 
   </div>

   <div class="form-group">
     <label class="col-sm-2 control-label" for="numero">Número:</label>
     <div class="col-sm-5">     
       <input class="form-control" type="text" name="numero" value="{{$empresa->numero}}" >
     </div> 
   </div>

   <div class="form-group">
     <label class="col-sm-2 control-label" for="bairro">Bairro:</label>
     <div class="col-sm-5">     
       <input class="form-control" type="text" name="bairro" value="{{$empresa->bairro}}" >
     </div> 
   </div>

   <div class="form-group">
     <label class="col-sm-2 control-label" for="cidade">Cidade:</label>
     <div class="col-sm-5">     
       <input class="form-control" type="text" name="cidade" value="{{$empresa->cidade}}" >
     </div> 
   </div>
 

   <div class="form-group">
     <label class="col-sm-2 control-label" for="db">DB:</label>
     <div class="col-sm-5">     
       <input class="form-control" type="text" name="db" value="{{$empresa->db}}" readonly >
     </div> 
   </div>

   <br />

   <div class="row">
     <div class="col-md-12">
       <div class="panel-footer"> 
        <button type="submit" class="btn btn-default btn-sm">                   
         <i class="fa fa-save" style="color:green;"></i> Salvar
       </button>
       <a class="btn btn-default btn-sm" href="{{ route('empresa.index')}}">
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
 </div>
 @endsection

 @section('imputmask')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>

$(document).ready(function(){
  $('#cnpj').mask('99.999.999/9999-99');
  
});

</script>

@stop