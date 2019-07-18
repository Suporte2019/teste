<!--
 * wsim/ACL/role/index.blade
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

@section('title', 'Listar - Grupos')

@section('content')

@if(Session::has('mensagem'))
  <div class="row">
    <div class="col-md-9 col-md-offset-1">
     <div class="alert alert-warning">
        <div align="center">
         {{ Session::get('mensagem')['msg'] }}
         <a class="close" data-dismiss="alert">&times;</a>
        </div>
      </div>
   </div>
</div>        
@endif

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
       <li class="active">Grupo</li>
      </ol> 

      <div class="panel-body">
       <div class="col-md-1">
        <a class="btn btn-default btn-sm" href="{{ route('grupo.create')}}">
          <i class="fa fa-plus-square"style="color:green"></i> Adicionar</a>
       </div>

       <div class="col-md-4">
        <form action="{{ route ('grupo.index')}}" method="get">
         {{ csrf_field()}}
         <div class="input-group input-group-sm">
          <input type="text" name="criterio" class="form-control" placeholder="buscar nome do grupo...">
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

      <table class="table table-bordered table-striped" style="width:100%">

       <thead class="thead-light">
        <tr>
         <!--th>id </th-->
          <th class="col-md-1" style="width:3%">#</th>
          <th class="col-md-4">Grupo</th>
          <th class="col-md-5">Descrição</th>
          <th class="col-md-2"></th>
         </tr>

        </thead>
        <tbody>

         @foreach($roles as $role)

         <tr>
          
          <td >{{$role->id}}</td>                          
          <td >{{$role->nome}}</td>
          <td >{{$role->descricao}}</td>  

          <td style="text-align: right;">
           
          <form class="delete" action="{{ route('grupo.destroy', $role->id) }}" method="POST">
          
          <a href="{{route('grupo.edit',$role->id)}}" class="btn btn-link btn-xs">
            <span class="glyphicon glyphicon-pencil"></span>
           </a>
            <a href="{{route('grupo.filtrapermission', $role->id)}}" class="btn btn-link btn-xs" data-toggle="popover" data-container="body" title="Lista PERMISSÕES relacionadas a esse GRUPO.">
            <i class="fa fa-unlock" style="color:orange"></i>
          </a>
           <a href="{{route('grupo.filtrauser', $role->id)}}" class="btn btn-link btn-xs" data-toggle="popover" data-container="body" title="Lista USUÁRIOS relacionados a esse GRUPO.">
            <i class="glyphicon glyphicon-user" style="color:green"></i>
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
    {!! $roles->appends($form)->links()!!}
    @else
    {!! $roles->links() !!}
    @endif

   </div>

   <script>
  
  $(function () {
  $('.popover').popover({
    //container: 'body'
  })
})
</script>

   @stop