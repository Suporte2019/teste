<!--
 * wsim\Relatorios\PlanoProduto/listar.blade
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
					<li class="active">Relatórios Teste</li>
				</ol>

				<div class="panel-body">
					<div class="col-md-1">

						<!--a class="btn btn-primary btn-sm" href="#">Adicionar</a-->

					</div>

					<div class="row">
						<div class="col-md-3">
							<form action="{{ route ('biprodplanonivel.lista')}}" method="get">
								{{ csrf_field()}}

								<div class="row">

<script type="text/javascript">
    $('#example-single').multiselect();
</script>
<!-- Note the missing multiple attribute! -->
<select id="example-single">
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
    <option value="4">Option 4</option>
    <option value="5">Option 5</option>
    <option value="6">Option 6</option>
</select>		

								


								</div>

								
							</form>
						</div>

						<div class="col-md-6">


						</div>
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
							<th class="col-md-1">Código</th>
							<th class="col-md-4">Nome</th>
							<th class="col-md-5">Data</th>
							<th class="col-md-1">Ação</th>
						</tr>
					</thead>
					<tbody>






						</td>
						</tr>





					</tbody>

				</table>

			</div>

		</div>
	</div>
</div>

<div align="center">



</div>



@stop

