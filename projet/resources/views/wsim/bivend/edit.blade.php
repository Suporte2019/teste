    <!--
   * wsim/bivend/edit.blade
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

@section('title', 'Editar - Vendedor')

@section('content')

  <div class="container">
    <div class="row">
     <div class="col-md-11">
      <div class="panel panel-default">
       <ol class="breadcrumb panel-heading">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('vendedor.index')}}">Vendedor</a></li>
        <li class="active">Editar</li>
      </ol>

      <!--div class="panel-body"-->

      <form class="form-horizontal" action="{{ route ('vendedor.update',$vendedor->id )}}" method="post">
       {{ csrf_field() }}
       <input type="hidden" name="_method" value="put">

           <!--div class="form-group">
            <label class="col-sm-2 control-label" for="id">ID:</label>
            <div class="col-sm-1">
             <input class="form-control" name="id" type="text" disabled value="{{$vendedor->id}}"> 
            </div>
          </div-->

          <div class="form-group">
            <label class="col-sm-2 control-label" for="id_vend">Código:</label>
            <div class="col-sm-1">
             <input class="form-control" name="id_vend" type="text" value="{{$vendedor->id_vend}}" readonly>
           </div>
         </div>

         <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
          <label class="col-sm-2 control-label" for="nome">Nome:</label>
          <div class="col-sm-5">     
           <input class="form-control" type="text" name="nome" value="{{$vendedor->nome}}">
           @if ($errors->has('nome'))
           <span class="help-block">
            <strong>{{ $errors->first('nome') }}</strong>
          </span>
          @endif
        </div> 
      </div>

      <div class="form-group {{ $errors->has('id_vend_tp') ? 'has-error' : '' }}">
        <label class="col-sm-2 control-label" for="id_vend_tp">Tipo Vendedor:</label>
        <div class="col-sm-5">
         <select class="form-control" name="id_vend_tp">
          @foreach($vendedortipos as $vendedortipo)
          <option value="{{$vendedortipo->id_vend_tp}}"
           {{(isset($vendedor->id_vend_tp) && $vendedor->id_vend_tp == $vendedortipo->id_vend_tp ?
             'selected' : '')}} > {{$vendedortipo->nome}}
           </option>
           @endforeach
         </select>              
       </div> 
     </div>

     <div class="form-group {{ $errors->has('id_regional') ? 'has-error' : '' }}">
      <label class="col-sm-2 control-label" for="id_regional">Regional:</label>
      <div class="col-sm-5"> 
       <select class="form-control" name="id_regional">
        @foreach($regionais as $regional)
        <option value="{{$regional->id_regional}}"
         {{(isset($vendedor->id_regional) && $vendedor->id_regional == $regional->id_regional ?
           'selected' : '')}} > {{$regional->nome}}
         </option>
         @endforeach
       </select>           

     </div> 
   </div>

   <div class="form-group {{ $errors->has('ativo') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label" for="ativo">Ativo:</label>
    <div class="col-sm-1"> 
      <select class="form-control" name="ativo">
       <option value="{{$vendedor->ativo}}" selected>{{$vendedor->ativo}}</option>
       <option>S</option>
       <option>N</option>
     </select>           
   </div> 
  </div>

  <div class="form-group {{ $errors->has('dt_alt') ? 'has-error' : '' }}">
    <label class="col-sm-2 control-label" for="dt_alt">Data:</label>
    <div class="col-sm-3">     
     <input class="form-control" type="text" name="dt_alt" 
     value="{{date('Y/m/d H:i:s')}}" disabled>
   </div> 
  </div>

  <br />

  <div class="row">
   <div class="col-md-12">
     <div class="panel-footer"> 
      <button type="submit" class="btn btn-default btn-sm">                   
       <i class="fa fa-save" style="color:green;"></i> Salvar
     </button>
     <a class="btn btn-default btn-sm" href="{{ route('vendedor.index')}}">
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