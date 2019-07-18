  <!--
   * wsim/bicondpagto/index.blade
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

  @section('title', 'Listar - Condição de Pagamento')

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
       <li class="active">Condição Pagamento</li>
      </ol> 

      <div class="panel-body">
       <div class="col-md-1">
        @can('Adicionar')
        <a class="btn btn-default btn-sm" href="{{ route('condpagto.create')}}">
        <i class="fa fa-plus-square"style="color:green"></i> Adicionar</a>
        @endcan
       </div>

       <div class="col-md-4">
        <form action="{{ route ('condpagto.index')}}" method="get">
         {{ csrf_field()}}
         <div class="input-group input-group-sm">
          <input type="text" name="criterio" class="form-control" placeholder="buscar condição pagto...">
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
         <!--th>id</th-->
         <th class="col-md-1" style="width:5%">#</th>
         <th class="col-md-4">Nome</th>
         <th class="col-md-2">Parcela</th>
         <th class="col-md-2">Prazo</th>
         <th class="col-md-2">Data</th>
         <th class="col-md-1"></th>
        </tr>
       </thead>
       <tbody>

        @foreach($condicaopagtos as $condicaopagto)

        <tr>
         <!--td >{{$condicaopagto->id}}</td-->
         <td >{{$condicaopagto->id_cond_pag}}</td>                          
         <td >{{$condicaopagto->nome}}</td>
         <td >{{$condicaopagto->parcelas}}</td>
         <td >{{$condicaopagto->prazo_medio}}</td>
         <td >{{ (new DateTime($condicaopagto->dt_alt))->format('d/m/y H:i:s')}}</th>

         <td style="text-align: right;">

          <form class="delete" action="{{ route('condpagto.destroy', $condicaopagto->id) }}" method="POST">
          
          <a href="{{route('condpagto.edit',$condicaopagto->id)}}" class="btn btn-link btn-xs">
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
    {!! $condicaopagtos->appends($form)->links()!!}
    @else
    {!! $condicaopagtos->links() !!}
    @endif

   </div>
   @stop
