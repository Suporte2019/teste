<!--
 * wsim/administracao/importar/importar.blade
 *
 * @version    1.0
 * @package    control
 * @subpackage BI
 * @author     FRDI
 * @copyright  Copyright (c) 2018 FRDI
 * @license    FRDI

 ************************************************************************
-->

<!--@extends('adminlte::page')-->

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
   <div class="box box-primary">
    <div class="panel panel-default">

     <ol class="breadcrumb panel-heading">
      <li><a href="{{route('home')}}">Home</a></li>
      <li class="active">Importação de Dados</li>
     </ol> 

     <div class="panel-body">
       <!--div class="col-md-1">
        @can('Painel')
        <a class="btn btn-primary btn-sm" href="{{ route('user.adicionar')}}">Adicionar</a>
        @endcan       
       </div-->

       <div class="col-md-6">
        <!-- /.box-header -->
        <div class="box-body">
         <form action="{{route('importar.csv')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}

          <div class="form-group">
           <label for="file">Arquivo CSV para Importação - biprod ( id_tem / id_grupo / nome )</label>
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
      </div>


     </div>

    </div>
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
