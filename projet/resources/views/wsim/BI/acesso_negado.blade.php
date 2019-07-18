 <!--
  * wsim/BI/acesso_negado.blade
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

@section('title', 'Acesso Negado')

@section('content')

@if(Session::has('mgs_sucesso'))

<div class="container">
  <div class="row">
   <div class="col-md-9 col-md-offset-1">
    <div align="center" class="alert  {{ Session::get('mgs_sucesso')['class']}}">
     <a class="close" data-dismiss="alert">&times;</a>
     {{ Session::get('mgs_sucesso')['msg']}}

   </div>
 </div>
</div>
</div>

@endif

<!--div class="container">
  <div class="row">
   <div class="col-md-11">
    <div class="panel panel-default">

     <ol class="breadcrumb panel-heading">
      <li><a href="{{route('home')}}">Home</a></li>
      <li class="active">Acesso Negado</li>
    </ol> 

  
</div>
</div>
</div>
</div-->






@stop