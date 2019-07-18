<!--
 * wsim/biprodplano/index.blade
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

@section('title', 'Listar - Plano dos Produtos')

@section('content')

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
         <li class="active">Plano Produto</li>
        </ol> 

        <div class="panel-body">
         <div class="col-md-1">

          <a class="btn btn-default btn-sm" href="{{ route('produtoplano.create')}}"><i class="fa fa-plus-square"style="color:green"></i> Adicionar</a>

         </div>

         <div class="col-md-4">
          <form action="{{ route ('produtoplano.index')}}" method="get">
           {{ csrf_field()}}
           <div class="input-group input-group-sm">
            <input type="text" name="criterio" class="form-control" placeholder="buscar nome do plano...">
            <div class="input-group-btn">
             <button type="submit" class="btn btn-default">

              <i class="glyphicon glyphicon-search"></i>
             </button>
            </div>
           </div>
          </form>
         </div> 

        </div>

       </div>
      </div>
     </div>
    </div>

    <div class="container">
     <div class="row">
      <div class="col-md-11">
       <div class="panel panel-default table-responsive">

        <table id="#teste" class="table table-bordered table-striped" style="width:100%">

         <thead class="thead-light">
          <tr>
           <!--th>id </th-->
           <th class="col-md-1" style="width:5%">#</th>
           <th class="col-md-1">Nível</th>
           <th class="col-md-4">Nome</th>
           <!--th class="col-md-1">cod_nivel_pai</th-->
           <th class="col-md-1">id_pai</th>
           <th class="col-md-1">nivel_cod</th>
           <th class="col-md-3">Grupo Prod</th>
           <th class="col-md-1"></th>
          </tr>
         </thead>
         <tbody>

          @foreach($planoprodutos as $planoproduto)

          <tr>
           <!--td>{{$planoproduto->id}}</td-->
           <td>{{$planoproduto->id_it_plano}}</td>   
           <td>{{$planoproduto->nivel}}</td>
           <td>{{$planoproduto->nivel_nome}}</td>
           <!--td>{{$planoproduto->cod_nivel_pai}}</td-->
           <td>{{$planoproduto->id_pai}}</td>
           <td>{{$planoproduto->nivel_cod}}</td>
           <td>{{$planoproduto->id_it_grupo}}</td>
           

          <td style="text-align: right;">

              <form class="delete" action="{{ route('produtoplano.destroy', $planoproduto->id) }}" method="POST">
          
          <a href="{{route('produtoplano.edit',$planoproduto->id)}}" class="btn btn-link btn-xs">
            <span class="glyphicon glyphicon-pencil"></span>
          </a>

          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <button type="submit" class="btn btn-link btn-xs" onclick="return confirm('Deseja realmente deletar?')">
           <span class="glyphicon glyphicon-trash" style="color:red"></span>
         </button>

       </form>
            
           </td> 
          </tr>

          @endforeach

         

         </tbody>

        </table>

       </div> 
      </div>
     </div>
    </div>

    <div align="center">

     @if (isset($form))
     {!! $planoprodutos->appends($form)->links()!!}
     @else
     {!! $planoprodutos->links() !!}
     @endif 
     
    </div>

    @stop