<!--
 * wsim/biprodplanonivel/index.blade
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

@section('title', 'Listar - Nível Plano dos Produtos')

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
			 <li class="active">Nível Produto</li>
			</ol> 

			<div class="panel-body">
			 <div class="col-md-1">

				<a class="btn btn-default btn-sm" href="{{ route('produtoplanonivel.create')}}"><i class="fa fa-plus-square"style="color:green"></i> Adicionar</a>

			 </div>

			 <div class="col-md-4">
				<form action="{{ route ('produtoplanonivel.index')}}" method="get">
				 {{ csrf_field()}}
				 <div class="input-group input-group-sm">
					<input type="text" name="criterio" class="form-control" placeholder="buscar nome do nível...">
					<div class="input-group-btn">
					 <button type="submit" class="btn btn-default">

						<i class="glyphicon glyphicon-search"></i>
					 </button>
					</div>
				 </div>
				</form>
			 </div>

			 <div class="col-md-6">
        <!--a class="btn btn-default btn-sm" href="{{ route('biprod.pdf')}}">
         <i class="fa fa-file-pdf-o"> Gerar PDF</i></a-->

         <!--a class="btn btn-primary btn-sm" href="{{ route('biprod.xlsx')}}">
          <i class="fa fa-file-excel-o"> Gerar XLSX</i></a>

          <a class="btn btn-primary btn-sm" href="{{ route('biprod.csv')}}">      
           <i class="fa fa-file-text-o"> Gerar CSV</i></a-->
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

			<table  class="table table-bordered table-striped" style="width:100%">

			 <thead class="thead-light">
				<tr>
				 <!--th>id </th-->
				 <th class="col-md-1" style="width:5%">#</th>
				 <th class="col-md-4">Nome</th>
				 <th class="col-md-5">Data</th>
				 <th class="col-md-2"></th>
				</tr>
			 </thead>
			 <tbody>

				@foreach($nivelplanos as $nivelplano)

				<tr>
				 <!--td>{{$nivelplano->id}}</td-->
				 <td>{{$nivelplano->id_nivel}}</td>   
				 <td>{{$nivelplano->nome}}</td>
				 <td>{{ date('d/m/Y H:m:s', strtotime($nivelplano->dt_alt))}}</td>

				<td style="text-align: right;">

				 <form class="delete" action="{{ route('produtoplanonivel.destroy', $nivelplano->id) }}" method="POST">
          
          <a href="{{route('produtoplanonivel.edit',$nivelplano->id)}}" class="btn btn-link btn-xs">
            <span class="glyphicon glyphicon-pencil"></span>
          </a>
           <a href="{{ route ('biprodplano.filtraplano',$nivelplano->id_nivel)}}" class="btn btn-link btn-xs">
					<span class="glyphicon glyphicon-search" style="color:grey"></span>
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
  {!! $nivelplanos->appends($form)->links()!!}
 @else
  {!! $nivelplanos->links() !!}
@endif

	</div>

 @stop