	<!--
	 * wsim/bipessoa/create.blade
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

	@section('title', 'Adicionar - Pessoas')

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
						<li><a href="{{route('pessoa.index')}}">Pessoa</a></li>
						<li class="active">Adicionar</li>
					</ol>

					<!--div class="panel-body"-->

					<form class="form-horizontal" action="{{ route ('pessoa.store')}}" method="post">
						{{ csrf_field() }}

								<!--div class="form-group">
									<label class="col-sm-2 control-label" for="id">ID:</label>
									<div class="col-sm-1">
										<input class="form-control" name="id" type="text" disabled>
									</div>
								</div-->

								<div class="form-group {{ $errors->has('id_pessoa') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label" for="id_pessoa">Código:</label>
									<div class="col-sm-1">
										<input class="form-control" name="id_pessoa" type="text" >
									</div>
								</div>

								<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label" for="nome">Nome:</label>
									<div class="col-sm-6">     
										<input class="form-control" type="text" name="nome" value="{{old('nome')}}" placeholder="Nome">
										@if ($errors->has('nome'))
										<span class="help-block">
											<strong>{{ $errors->first('nome') }}</strong>
										</span>
										@endif
									</div> 
								</div>

								<div class="form-group {{ $errors->has('cidade') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label" for="nome">Cidade:</label>
									<div class="col-sm-3">     
										<input class="form-control" type="text" name="cidade" value="{{old('cidade')}}" placeholder="Cidade">
										@if ($errors->has('cidade'))
										<span class="help-block">
											<strong>{{ $errors->first('cidade') }}</strong>
										</span>
										@endif
									</div> 
									<label class="col-sm-1 control-label" for="uf">UF:</label>
									<div class="col-sm-2">     
										<select class="form-control" name="uf">
											<option value="" disabled selected>UF...</option>
											@foreach($ufs as $uf)
											<option value="{{$uf->uf}}"
												{{(isset($pessoa->uf) && $pessoa->uf == $uf->id ? 
													'' : '')}} > {{$uf->uf}}
												</option>
												@endforeach
											</select>
											@if ($errors->has('uf'))
											<span class="help-block">
												<strong>{{ $errors->first('uf') }}</strong>
											</span>
											@endif
										</div>
									</div>

									<div class="form-group {{ $errors->has('id_vend') ? 'has-error' : '' }}">
										<label class="col-sm-2 control-label" for="id_vend">Vendedor:</label>
										<div class="col-sm-6">
											<select class="form-control" name="id_vend">
												<option value="" disabled selected>Informe o Vendedor...</option>
												@foreach($vendedores as $vendedor)
												<option value="{{$vendedor->id_vend}}"
													{{(isset($pessoa->id_vend) && $pessoa->id_vend == $vendedor->id_vend ?
														'selected' : '')}} > {{$vendedor->nome}}
													</option>
													@endforeach
												</select>
												@if ($errors->has('id_vend'))
												<span class="help-block">
													<strong>{{ $errors->first('id_vend') }}</strong>
												</span>
												@endif
											</div> 
										</div>

										<div class="form-group {{ $errors->has('id_regiao') ? 'has-error' : '' }}">
											<label class="col-sm-2 control-label" for="id_regiao">Região:</label>
											<div class="col-sm-6">     
												<select class="form-control" name="id_regiao">
													<option value="" disabled selected>Informe a Região...</option>
													@foreach($regioes as $regiao)
													<option value="{{$regiao->id_regiao}}"
														{{(isset($pessoa->id_regiao) && $pessoa->id_regiao == $regiao->id_regiao ?
															'selected' : '')}} > {{$regiao->nome}}
														</option>
														@endforeach
													</select>
													@if ($errors->has('id_regiao'))
													<span class="help-block">
														<strong>{{ $errors->first('id_regiao') }}</strong>
													</span>
													@endif
												</div> 
											</div>

											<div class="form-group {{ $errors->has('id_categ') ? 'has-error' : '' }}">
												<label class="col-sm-2 control-label" for="id_categ">Categoria:</label>
												<div class="col-sm-6">     
													<select class="form-control" name="id_categ">
														<option value="" disabled selected>Informe a Categoria...</option>
														@foreach($categorias as $categoria)
														<option value="{{$categoria->id_categ}}"
															{{(isset($pessoa->id_categ) && $pessoa->id_categ == $categoria->id_categ ?
																'selected' : '')}} > {{$categoria->nome}}
															</option>
															@endforeach
														</select>
														@if ($errors->has('id_categ'))
														<span class="help-block">
															<strong>{{ $errors->first('id_categ') }}</strong>
														</span>
														@endif

													</div> 
												</div>

												<div class="form-group {{ $errors->has('ativo') ? 'has-error' : '' }}">
													<label class="col-sm-2 control-label" for="ativo">Ativo:</label>
													<div class="col-sm-2">     
														<select class="form-control" name="ativo">
															<option>S</option>
															<option>N</option>
														</select>
													</div>
													<label class="col-sm-1 control-label" for="dt_alt">Data:</label>
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
															<a class="btn btn-default btn-sm" href="{{ route('pessoa.create')}}">
																<i class="fa fa-eraser" style="color:red;"></i> Limpar</a>

																<a class="btn btn-default btn-sm" href="{{ route('pessoa.index')}}">
																	<i class="fa fa-list" style="color:blue;"></i> Lista</i></a>
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