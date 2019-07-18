<!--
 * wsim/administracao/importar/impfatuamento.blade
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

@section('content')



@if(Session::has('mgs_error'))

<div class="container">
 <div class="row">
  <div class="col-md-9 col-md-offset-1">
   <div align="center" class="alert {{ Session::get('mgs_error')['class']}}">
    <a class="close" data-dismiss="alert">&times;</a>
    {{ Session::get('mgs_error')['msg']}}

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
   <!--div class="box box-primary"-->
    <div class="panel panel-default">

     <ol class="breadcrumb panel-heading">
      <li><a href="{{route('home')}}">Home</a></li>
      <li class="active">Importar Faturamento</li>
     </ol> 

     <div class="panel-body">
      

       <div class="col-md-6">
        <!-- /.box-header -->
        <div class="box-body">
         <form action="{{'impfaturamento'}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}

          <div class="form-group">
           <label for="file">Arquivo CSV para Importação - BICATEG - SOMENTE TESTE </label>
           <input type="file" name="file" id="file" class="form-control">
           
          </div>

          <div class="form-group">
           <button class="btn btn-primary">
            <i class="fa fa-upload"></i> Importar
           </button>
          </div>
         </form>
        </div>
       </div>

      <div class="col-md-6">
        <!-- /.box-header -->
        <div class="box-body">
        

          <div class="form-group">
           <label for="file">Exportar para CSV - BICATEG - SOMENTE TESTE </label>
          
          </div>

          <div class="form-group">
          
          <a class="btn btn-primary" href="{{ route('bifatura.expXLSX')}}">      
           <i class="fa fa-download"> XLSX</i></a>

            <a class="btn btn-primary" href="{{ route('bifatura.expCSV')}}">      
           <i class="fa fa-download"> CSV</i></a>
          </div>
          
          </div>
        
        </div>
       


      </div>

     </div>

    <!--/div-->
   </div>
  </div>


  <!--div class="container">
   <div class="row">
    <div class="col-md-11">
     <div class="panel panel-default">


      </div> 

     </div>
    </div>
   </div-->

   @stop
