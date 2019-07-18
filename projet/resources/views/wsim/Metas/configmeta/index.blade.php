  <!--
 * wsim/Metas/configmeta/index.blade
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

@section('title', 'Listar - Configura Meta')

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
          <li class="active">Configura Meta</li>
         </ol> 
         <div class="panel-body">
          <div class="col-md-1">
           <a class="btn btn-default btn-sm" href="#"><i class="fa fa-plus-square"style="color:green"></i> Adicionar</a>

          </div>

          <div class="col-md-4">
           <form action="{{ route ('meta.index')}}" method="get">
            {{ csrf_field()}}
            <div class="input-group input-group-sm">
             <input type="text" name="criterio" class="form-control" placeholder="buscar nome da meta...">
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
        <div class="panel panel-default">
         <!--table  class="table table-bordered table-striped" style="width:100%">

          <thead class="thead-light">
           <tr>

            <th>id </th>
            <th class="col-md-1" style="width:5%">#</th>
            <th class="col-md-4">Nome</th>
            <th class="col-md-2">Vendedor Tipo</th>
            <th class="col-md-1">Regional</th>
            <th class="col-md-1">Ativo</th>
            <th class="col-md-2">Data</th>
            <th class="col-md-1"></th>

           </tr>

          </thead>
          <tbody>

          

           <tr>
           
           
            
            <td style="text-align: right;">

           

            </td> 
           </tr>

           

          </tbody>

         </table
        </div> 
       </div>
      </div>
     </div>

     <div align="center">

     

     </div-->

@stop