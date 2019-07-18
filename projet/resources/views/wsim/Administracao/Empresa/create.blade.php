<!--
* wsim/Administracao/Empresa/create.blade
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

@section('title', 'Adicionar - Empresa')

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
					<li><a href="{{route('empresa.index')}}">Empresa</a></li>
					<li class="active">Adicionar</li>
				</ol>

				<!--div class="panel-body"-->

				<form class="form-horizontal" action="{{ route ('empresa.store')}}" method="post">
					{{ csrf_field() }}

					
							<!--div class="form-group">
								<label class="col-sm-2 control-label" for="id">Código:</label>
								<div class="col-sm-1">
									<input class="form-control" name="id" type="text">
								</div>
							</div-->

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

							<div class="form-group {{ $errors->has('cnpj') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label" for="cnpj">CNPJ:</label>
								<div class="col-sm-5">     
									<input class="form-control" placeholder="Ex: 99.999.999/9999-99" "type="text" name="cnpj" id="cnpj" value="{{old('cnpj')}}" >
									@if ($errors->has('cnpj'))
									<span class="help-block">
										<strong>{{ $errors->first('cnpj') }}</strong>
									</span>
									@endif
								</div> 
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label" for="razao">Razão:</label>
								<div class="col-sm-5">     
									<input class="form-control" type="text" name="razao" value="{{old('razao')}}" placeholder="Razão Social">
								</div> 
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label" for="endereco">Endereço:</label>
								<div class="col-sm-5">     
									<input class="form-control" type="text" name="endereco" value="{{old('endereço')}}" placeholder="Endereço">
								</div> 
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label" for="numero">Número:</label>
								<div class="col-sm-5">     
									<input class="form-control" type="text" name="numero" value="{{old('endereco')}}" placeholder="Número">
								</div> 
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label" for="bairro">Bairro:</label>
								<div class="col-sm-5">     
									<input class="form-control" type="text" name="bairro" value="{{old('bairro')}}" placeholder="Bairro">
								</div> 
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label" for="cidade">Cidade:</label>
								<div class="col-sm-5">     
									<input class="form-control" type="text" name="cidade" value="{{old('cidade')}}" placeholder="Cidade">
								</div> 
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label" for="db">DB:</label>
								<div class="col-sm-5">     
									<input class="form-control" type="text" name="db" value="{{old('db')}}" placeholder="Banco de Dados da Empresa">
								</div> 
							</div>

							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-3">
									<div class="checkbox">
										<label class="checkbox-inline">
											<input type="checkbox" name="criadb" value="" >CRIAR DATABASE (Conforme nome informado no DB)?
										</label>
									</div>
								</div>
							</div>

							<br />

							<div class="row">
								<div class="col-md-12">
									<div class="panel-footer">  
										<button type="submit" class="btn btn-default btn-sm">                  
											<i class="fa fa-save" style="color:green;"></i> Salvar
										</button>
										<a class="btn btn-default btn-sm" href="{{ route('empresa.create')}}">
											<i class="fa fa-eraser"style="color:red;"></i> Limpar</a>
											
											<a class="btn btn-default btn-sm" href="{{ route('empresa.index')}}">
												<i class="fa fa-list" style="color:blue" ></i> Listar</a>
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

@section('imputmask')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>

$(document).ready(function(){
  $('#cnpj').mask('99.999.999/9999-99');
  
});

</script>

@stop