			<!--
		 * wsim/bivend/create.blade
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

@section('title', 'Adicionar - Vendedor')

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
							<li><a href="{{route('vendedor.index')}}">Vendedor</a></li>
							<li class="active">Adicionar</li>
						</ol>

						<!--div class="panel-body"-->

						<form class="form-horizontal" action="{{ route ('vendedor.store')}}" method="post">
							{{ csrf_field() }}

											<!--div class="form-group">
												<label class="col-sm-2 control-label" for="id">ID:</label>
												<div class="col-sm-1">
													<input class="form-control" name="id" type="text" disabled>
												</div>
											</div-->

											<div class="form-group">
												<label class="col-sm-2 control-label" for="id_vend">Código:</label>
												<div class="col-sm-1">
													<input class="form-control" name="id_vend" type="text" >
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

											<div class="form-group {{ $errors->has('id_vend_tp') ? 'has-error' : '' }}">
												<label class="col-sm-2 control-label" for="id_vend_tp">Tipo Vendedor:</label>
												<div class="col-sm-5">
													<select class="form-control" name="id_vend_tp">
														<option value="" disabled selected>Informe o tipo vendedor...</option>
														@foreach($vendedortipos as $vendedortipo)
														<option value="{{$vendedortipo->id_vend_tp}}"
															{{(isset($vendedor->id_vend) && $vendedor->id_vend_tp == $vendedortipo->id_vend_tp ?
																'' : '')}} > {{$vendedortipo->nome}}
															</option>
															@endforeach
														</select> 
														@if ($errors->has('id_vend_tp'))
									<span class="help-block">
										<strong>{{ $errors->first('id_vend_tp') }}</strong>
									</span>
									@endif        
													</div> 
												</div>

												<div class="form-group {{ $errors->has('id_regional') ? 'has-error' : '' }}">
													<label class="col-sm-2 control-label" for="id_regional">Regional:</label>
													<div class="col-sm-5">  
														<select class="form-control" name="id_vend_tp">
															<option value="" disabled selected>Informe a regional...</option>
															@foreach($regionais as $regional)
															<option value="{{$regional->id_regional}}"
																{{(isset($vendedor->id_regional) && $vendedor->id_regional == $regional->id_regional ?
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

													<div class="form-group">
														<label class="col-sm-2 control-label" for="ativo">Ativo:</label>
														<div class="col-sm-1">     
															<select class="form-control" name="ativo">
																<option>S</option>
																<option>N</option>
															</select>
														</div> 
													</div>

													<div class="form-group {{ $errors->has('dt_alt') ? 'has-error' : '' }}">
														<label class="col-sm-2 control-label" for="dt_alt">Data:</label>
														<div class="col-sm-3">     
															<input class="form-control" type="text" name="dt_alt"
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
																<a class="btn btn-default btn-sm" href="{{ route('vendedor.create')}}">
																	<i class="fa fa-eraser"style="color:red;"></i> Limpar</a>

																	<a class="btn btn-default btn-sm" href="{{ route('vendedor.index')}}">
																		<i class="fa fa-list" style="color:blue;"></i> Lista</a>
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