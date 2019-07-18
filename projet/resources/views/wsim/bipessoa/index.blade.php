<!--
 * wsim/bipessoa/index.blade
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

@section('title', 'Listar - Pessoas')

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
        <li class="active">Pessoa</li>
       </ol> 

       <div class="panel-body">
        <div class="col-md-1">
         <a class="btn btn-default btn-sm" href="{{ route('pessoa.create')}}"><i class="fa fa-plus-square"style="color:green"></i> Adicionar</a>
        </div>

        <div class="col-md-4">
         <form action="{{ route ('pessoa.index')}}" method="get">
          {{ csrf_field()}}
          <div class="input-group input-group-sm">
           <input type="text" name="criterio" class="form-control" placeholder="buscar nome da pessoa...">
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

   <div class="container-fluid">
    <div class="row">
     <div class="col-md-12">
      <div class="panel panel-default table-responsive">


       <table class="table table-bordered table-striped" style="width:100%">

        <thead class="thead-light">
         <tr>
          <!--th>id</th-->
          <th class="col-md-1" style="width:5%">#</th>
          <th class="col-md-4">Nome</a></th>
          <th class="col-md-2">Cidade</a></th>
          <!--th class="col-md-1">UF</a></th-->
          <th class="col-md-1">Vendedor</a></th>
          <th class="col-md-1">Região</a></th>
          <th class="col-md-1">Categoria</a></th>
          <th class="col-md-1">Ativo</a></th>
          <!--th class="col-md-1">Data</th-->
          <th class="col-md-1"></th>
         </tr>

        </thead>
        <tbody>

         @foreach($pessoas as $pessoa)

         <tr>
          <!--td >{{$pessoa->id}}</td-->
          <td >{{$pessoa->id_pessoa}}</td>                          
          <td >{{$pessoa->nome}}</td>
          <td >{{$pessoa->cidade}}</td>
          <!--td >{{$pessoa->uf}}</td-->
          <td >{{$pessoa->id_vend}}</td>
          <td >{{$pessoa->id_regiao}}</td>
          <td >{{$pessoa->id_categ}}</td>
          <td >{{$pessoa->ativo}}</td>
          <!--td >{{ (new DateTime($pessoa->dt_alt))->format('d/m/y H:i:s')}}</th-->

            <td style="text-align: right;">

              <form class="delete" action="{{ route('pessoa.destroy', $pessoa->id) }}" method="POST">
          
          <a href="{{route('pessoa.edit',$pessoa->id)}}" class="btn btn-linky btn-xs">
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
    {!! $pessoas->appends($form)->links()!!}
    @else
    {!! $pessoas->links() !!}
    @endif

   </div>
   @stop