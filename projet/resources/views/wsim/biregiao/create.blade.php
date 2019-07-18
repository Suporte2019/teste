	<!--
	 * wsim/biregiao/create.blade
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

@section('title', 'Adicionar - Região')

@section('content')

@if(Session::has('mgs_sucesso'))

	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<div align="center" class="alert {{ Session::get('mgs_sucesso')['class']}}">

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
						<li><a href="{{route('regiao.index')}}">Região</a></li>
						<li class="active">Adicionar</li>
					</ol>

					<!--div class="panel-body"-->

					<form class="form-horizontal" action="{{ route ('regiao.store')}}" method="post">
						{{ csrf_field() }}

								<!--div class="form-group">
									<label class="col-sm-2 control-label" for="id">ID:</label>
									<div class="col-sm-1">
										<input class="form-control" name="id" type="text" disabled>
									</div>
								</div-->

								<div class="form-group {{ $errors->has('id_regiao') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label" for="id_regiao">Código:</label>
									<div class="col-sm-1">
										<input class="form-control" name="id_regiao" type="text" >
									</div>
								</div>
								
								<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label" for="nome">Nome:</label>
									<div class="col-sm-5">     
										<input class="form-control" type="text" name="nome" value="{{old('nome')}}" placeholder="Nome">
										@if ($errors->has('nome'))
										<span class="help-block">
											<strong>{{ $errors->first('nome') }}</strong>
										</span>
										@endif
										
									</div> 
								</div>

								<div class="form-group {{ $errors->has('id_regional') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label" for="id_regiao">Regional:</label>
									<div class="col-sm-5">
										<select class="form-control" name="id_regional">
											<option value="" disabled selected>Informe a Regional...</option>
											@foreach($regionais as $regional)
											<option value="{{$regional->id_regional}}"
												{{(isset($regiao->id_regional) && $regiao->id_regional == $regional->id_regional ?
													'' : '')}} > {{$regional->nome}}
												</option>
												@endforeach
											</select>
											@if ($errors->has('id_regional'))
											<span class="help-block">
												<strong>{{ $errors->first('id_regional') }}</strong>
											</span>
											@endif
										</div>
									</div>
									
									<div class="form-group {{ $errors->has('ativo') ? 'has-error' : '' }}">
										<label class="col-sm-2 control-label" for="nome">Ativo:</label>
										<div class="col-sm-1">
											<select class="form-control" name="ativo" type="text">
												<option>S</option>
												<option>N</option>
											</select>	     
										</div> 
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label" for="dt_alt">Data:</label>
										<div class="col-sm-3">
											<input class="form-control" name="dt_alt" type="text"
											value="{{now()}}" readonly>
										</div>
									</div>
									<br />

									<div class="row">
										<div class="col-md-12">
											<div class="panel-footer">  
												<button type="submit" class="btn btn-default btn-sm">                  
													<i class="fa fa-save" style="color:green;"></i> Salvar
												</button>
												<a class="btn btn-default btn-sm" href="{{ route('regiao.create')}}">
													<i class="fa fa-eraser"style="color:red;"></i> Limpar</a>

													<a class="btn btn-default btn-sm" href="{{ route('regiao.index')}}">
														<i class="fa fa-list" style="color:blue"></i> Lista</a>
													</div>
												</div>
											</div> 

										</form>
										<!--/div-->

									</div>
								</div>
							</div>
						</div>
						@endsection