<!--
 * trocaempresa/lista.blade
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

@section('title', 'Troca Empresa')

@section('content')


<div class="container">
 <div class="row">
  <div class="col-md-11">
   <div class="panel panel-default">

    <ol class="breadcrumb panel-heading">
     <li><a href="{{route('home')}}">Home</a></li>
     <li class="active"> Troca Empresa</li>
    </ol> 

    <div class="panel-body">
     <div class="col-md-1">

      <!--a class="btn btn-primary btn-sm" href="#">Adicionar</a-->

     </div>

     <div class="col-md-6">
      <form class="form-horizontal" action="{{ route ('trocaempresa.conecta')}}" method="get">
       {{ csrf_field()}}

       <div class="form-group">

        <label class="col-md-2 control-label" for="nome">Empresa:</label>
        <div class="col-sm-7">     
         <select  class="form-control" name="db_database[]">
          @foreach($emp_users as $emp_user)

          <option>

           {{$emp_user->db_database}}

          </option>
          @endforeach
         </select>
        </div>
        <button type="submit" class="btn btn-primary btn-md"> Conectar</i>
        </button>


        
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



    <p>Conectado ao Database:</p>

    <h2>{{ session('nomeempresa')['db_database'] ?? 'Não encontrou nome da Empresa'}}</h2>






   </div> 

  </div>
 </div>
</div>



@endsection