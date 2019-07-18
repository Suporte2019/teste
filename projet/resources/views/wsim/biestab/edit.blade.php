  <!--
   * wsim/biestab/edit.blade
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

@section('title', 'Editar - Estabelecimento')

 @section('content')
 
 <div class="container">
   <div class="row">
    <div class="col-md-11">
     <div class="panel panel-default">

      <ol class="breadcrumb panel-heading">
       <li><a href="{{route('home')}}">Home</a></li>
       <li><a href="{{route('estabelecimento.index')}}">Estabelecimento</a></li>
       <li class="active">Editar</li>
     </ol>

     <!--div class="panel-body"-->

     <form class="form-horizontal" action="{{ route ('estabelecimento.update',$estabelecimento->id )}}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="put">

          <!--div class="form-group">
           <label class="col-sm-2 control-label" for="id">ID:</label>
           <div class="col-sm-1">
            <input class="form-control" name="id" type="text" disabled value="{{$estabelecimento->id}}"> 
           </div>
         </div-->

         <div class="form-group">
           <label class="col-sm-2 control-label" for="id_estab">Código:</label>
           <div class="col-sm-1">
            <input class="form-control" name="id_estab" type="text" readonly value="{{$estabelecimento->id_estab}}">
          </div>
        </div>

        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
         <label class="col-sm-2 control-label" for="nome">Nome:</label>
         <div class="col-sm-5">     
          <input class="form-control" type="text" name="nome"  placeholder="Nome" value="{{$estabelecimento->nome}}">
          @if ($errors->has('nome'))
          <span class="help-block">
            <strong>{{ $errors->first('nome') }}</strong>
          </span>
          @endif
        </div> 
      </div>

      <div class="form-group">
       <label class="col-sm-2 control-label" for="ativo">Ativo:</label>
       <div class="col-sm-1">
        <select class="form-control" name="ativo">
         <option value="{{$estabelecimento->ativo}}" selected>{{$estabelecimento->ativo}}</option>
         <option>S</option>
         <option>N</option>
       </select>           
     </div>
   </div>
   <br />
   
   <div class="row">
     <div class="col-md-12">
       <div class="panel-footer"> 
        <button type="submit" class="btn btn-default btn-sm">                   
         <i class="fa fa-save" style="color:green;"></i> Salvar
       </button>
       <a class="btn btn-default btn-sm" href="{{ route('estabelecimento.index')}}">
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
</div>
@endsection