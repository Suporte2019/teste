<!--
 * Phpinfo/index.blade
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

@section('title', 'PHPInfo')

@section('content')

<div class="container">
 <div class="row">
  <div class="col-md-11">
   <!--div class="panel panel-default"-->

    <ol class="breadcrumb panel-heading">
     <li><a href="{{route('home')}}">Home</a></li>
     <li class="active">PHP info</li>
    </ol> 
  
   <!--/div-->
  </div>
 </div>
</div> 

<div class="container">
  <div class="row">
   <div class="col-md-11">
    <div class="panel panel-default pre-scrollable">
 
    $phpinfo
       
  
   </div>
  </div>
</div>
</div>

@endsection
