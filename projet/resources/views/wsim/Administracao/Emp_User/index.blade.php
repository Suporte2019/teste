<!--
 * wsim/Emp_User/index.blade
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

@section('title', 'Listar - Empresa x Usuário')

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
       <li class="active">Empresa</li>
      </ol> 

      <div class="panel-body">
       <div class="col-md-1">
        @can('Painel')
        <a class="btn btn-default btn-sm" href="{{ route('emp_user.create')}}"><i class="fa fa-plus-square"style="color:green"></i> Adicionar</a>
        @endcan       
       </div>

       <div class="col-md-4">
        <form action="{{ route ('emp_user.index')}}" method="get">
         {{ csrf_field()}}
         <div class="input-group input-group-sm">
          <input type="text" name="criterio" class="form-control" placeholder="buscar nome da empresa...">
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
          <th class="col-md-1" style="width:3%">#</th>
          <th class="col-md-3">Empresa</th>
          <th class="col-md-2">DB_Name</th>
          <th class="col-md-1" style="width:8%">DB_Host</th>
          <th class="col-md-1"style="width:8%">DB_User</th>
          <th class="col-md-3">Usuário</th>
          <!--th class="col-md-1">db_password</th-->
          <!--th class="col-md-1">Validade</th-->
          <th class="col-md-1"></th>
         </tr>

        </thead>
        <tbody>

         @foreach($emp_users as $emp_user)

         <tr>
         
          <td >{{$emp_user->id}}</td>                          
          <td >{{$emp_user->nome_empresa}}</td>
          <td >{{$emp_user->db_database}}</td>
          <td >{{$emp_user->db_hostname}}</td>
          <td >{{$emp_user->db_username}}</td>
          <td >{{$emp_user->usuario}}</td>
          <!--td >{{$emp_user->db_password}}</td-->
          <!--td >{{$emp_user->validade}}</td-->
          
          <!--td>{{ date('d/m/Y H:m:s', strtotime($emp_user->created_at))}}</td-->
          <!--td>{{ date('d/m/Y H:m:s', strtotime($emp_user->updated_at))}}</td-->

          <td style="text-align: right;">

           <form class="delete" action="{{ route('emp_user.destroy', $emp_user->id) }}" method="POST">
          
          <a href="{{route('emp_user.edit',$emp_user->id)}}" class="btn btn-link btn-xs">
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
    {!! $emp_users->appends($form)->links()!!}
    @else
    {!! $emp_users->links() !!}
    @endif

   </div>

   @stop