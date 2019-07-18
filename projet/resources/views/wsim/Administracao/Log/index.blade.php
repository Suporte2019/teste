 <!--
  * wsim/bicateg/index.blade
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

@section('title', 'Listar - Log de Acesso')

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
      <li class="active">Log de Acesso</li>
    </ol> 

    <div class="panel-body">
      <!--div class="col-md-1">
       <a class="btn btn-default btn-sm" href="{{ route('log_acesso.create')}}">
          <i class="fa fa-plus-square"style="color:green"></i> Adicionar</a>
     </div-->
     
     <div class="col-md-4">
       <form action="{{ route ('log_acesso.index')}}" method="get">
        {{ csrf_field()}}
        <div class="input-group input-group-sm">
         <input type="text" name="criterio" class="form-control" placeholder="buscar nome do usuário...">
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
         
        <th class="col-md-1" style="width:5%">#</th>
        <th class="col-md-3">Usuário</th>
        <th class="col-md-4">Login</th>
        <th class="col-md-1">Tipo</th>
        <th class="col-md-2">Data</th> 
              
      </tr>

    </thead>
    
    <tbody>

     @foreach($log_acessos as $log_acesso)

     <tr>
      
      <td >{{$log_acesso->id}}</td>                          
      <td >{{$log_acesso->nome}}</td>
      <td >{{$log_acesso->login}}</td>
       <td >{{$log_acesso->tipo}}</td>
      <td>{{ date('d/m/Y H:i:s', strtotime($log_acesso->data))}}</td>
      

      <td style="text-align: right;">
        
        <form class="delete" action="{{ route('log_acesso.destroy', $log_acesso->id) }}" method="POST">
          
          <!--a href="{{route('log_acesso.edit',$log_acesso->id)}}" class="btn btn-linl btn-xs">
            <span class="glyphicon glyphicon-pencil"></span>
          </a-->

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
 {!! $log_acessos->appends($form)->links()!!}
 @else
 {!! $log_acessos->links() !!}
 @endif

</div>


@stop