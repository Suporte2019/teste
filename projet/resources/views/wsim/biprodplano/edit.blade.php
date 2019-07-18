       <!--
     * wsim/biprodgrupo/edit.blade
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

@section('title', 'Editar - Plano do Produto')

@section('content')

   <div class="container">
     <div class="row">
      <div class="col-md-11">
       <div class="panel panel-default">

        <ol class="breadcrumb panel-heading">
         <li><a href="{{route('home')}}">Home</a></li>
         <li><a href="{{route('produtoplano.index')}}">Plano Produto</a></li>
         <li class="active">Editar</li>
       </ol>

       <!--div class="panel-body"-->

         <form class="form-horizontal" action="{{ route ('produtoplano.update',$planoproduto->id )}}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="put">

                <!--div class="form-group">
                 <label class="col-sm-2 control-label" for="id">ID:</label>
                 <div class="col-sm-1">
                  <input class="form-control" name="id" type="text" disabled value="{{$planoproduto->id}}"> 
                 </div>
               </div-->

               <div class="form-group">
                 <label class="col-sm-2 control-label" for="id_it_plano">Código:</label>
                 <div class="col-sm-1">
                  <input class="form-control" name="id_it_plano" type="text" readonly value="{{$planoproduto->id_it_plano}}"> 
                </div>
              </div>

              <div class="form-group {{ $errors->has('nivel_nome') ? 'has-error' : '' }}">
               <label class="col-sm-2 control-label" for="nivel_nome">Nome:</label>
               <div class="col-sm-5">     
                <input class="form-control" type="text" name="nivel_nome" value="{{$planoproduto->nivel_nome}}">
                @if ($errors->has('nivel_nome'))
                <span class="help-block">
                  <strong>{{ $errors->first('nivel_nome') }}</strong>
                </span>
                @endif
              </div> 
            </div>

            <div class="form-group {{ $errors->has('nivel') ? 'has-error' : '' }}">
             <label class="col-sm-2 control-label" for="nivel">Nível Plano:</label>
             <div class="col-sm-5">
              <select class="form-control" name="nivel">
               @foreach($nivelplanos as $nivelplano)
               <option value="{{$nivelplano->id_nivel}}"
                {{(isset($planoproduto->nivel) && $planoproduto->nivel == $nivelplano->id_nivel ?
                  'selected' : '')}} > {{$nivelplano->nome}}
                </option>
                @endforeach
              </select>        
            </div> 
          </div>

          <div class="form-group">
           <label class="col-sm-2 control-label" for="cod_nivel_pai">Cod_nivel_pai:</label>
           <div class="col-sm-2">     
            <input class="form-control" type="text" name="cod_nivel_pai" value="{{$planoproduto->cod_nivel_pai}}"> 
          </div> 
        </div>

        <div class="form-group">
         <label class="col-sm-2 control-label" for="id_pai">id_pai:</label>
         <div class="col-sm-2">     
          <input class="form-control" type="text" name="id_pai" value="{{$planoproduto->id_it_plano}}"> 
        </div> 
      </div>

      <div class="form-group">
       <label class="col-sm-2 control-label" for="nivel-cod">Nível_cod:</label>
       <div class="col-sm-2">     
        <input class="form-control" type="text" name="nivel_cod" value="{{$planoproduto->nivel_cod}}"> 
      </div> 
    </div>

    <div class="form-group">
     <label class="col-sm-2 control-label" for="id_it_grupo">Grupo Produto:</label>
     <div class="col-sm-5">
       <select class="form-control" name="id_it_grupo">
         @foreach($grupoprodutos as $grupoproduto)
         <option value="{{$grupoproduto->id_grupo}}"
          {{(isset($planoproduto->id_it_grupo) && $planoproduto->id_it_grupo == $grupoproduto->id_grupo ?
            'selected' : '')}} > {{$grupoproduto->nome}}
          </option>
          @endforeach
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
       <a class="btn btn-default btn-sm" href="{{ route('produtoplano.index')}}">
         <i class="fa fa-list" style="color:blue"></i> Listar</a>
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