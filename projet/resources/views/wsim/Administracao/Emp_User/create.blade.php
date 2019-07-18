	<!--
	 * wsim/Administracao/Emp_User/create.blade
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

@section('title', 'Adicionar - Empresa x Usuário')

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
						<li><a href="{{route('emp_user.create')}}">Empresa</a></li>
						<li class="active">Adicionar</li>
					</ol>

					<!--div class="panel-body"-->

					<form class="form-horizontal" action="{{ route ('emp_user.store')}}" method="post">
						{{ csrf_field() }}


						<div class="form-group {{ $errors->has('nome_empresa') ? 'has-error' : '' }}">
							<label class="col-sm-2 control-label" for="nome_empresa">Empresa:</label>
							<div class="col-sm-5">     
								<select class="form-control" name="nome_empresa">
									<option value="" disabled selected>Informe a Empresa...</option>
									@foreach($empresas as $empresa)
									<option value="{{$empresa->nome}}"
										>{{$empresa->nome}}
									</option>
									@endforeach
								</select>
								@if ($errors->has('nome_empresa'))
								<span class="help-block">
									<strong>{{ $errors->first('nome_empresa') }}</strong>
								</span>
								@endif
							</div> 
						</div>


						<div class="form-group {{ $errors->has('db_database') ? 'has-error' : '' }}">
							<label class="col-sm-2 control-label" for="db_database">DB_Name:</label>
							<div class="col-sm-5">     
								<input class="form-control" type="text" name="db_database"  value="{{old('db_database')}}"placeholder="Database">
								@if ($errors->has('db_database'))
								<span class="help-block">
									<strong>{{ $errors->first('db_database') }}</strong>
								</span>
								@endif
							</div> 
						</div>

						<div class="form-group {{ $errors->has('db_hostname') ? 'has-error' : '' }}">
							<label class="col-sm-2 control-label" for="db_hostname">DB_Host:</label>
							<div class="col-sm-5">     
								<input class="form-control" type="text" name="db_hostname"  value="{{old('db_hostname')}}"placeholder="Hostname">
								@if ($errors->has('db_hostname'))
								<span class="help-block">
									<strong>{{ $errors->first('db_hostname') }}</strong>
								</span>
								@endif
							</div> 

						</div>

						<div class="form-group {{ $errors->has('db_username') ? 'has-error' : '' }}">
							<label class="col-sm-2 control-label" for="db_hostname">DB_User:</label>
							<div class="col-sm-5">     
								<input class="form-control" type="text" name="db_username"  value="{{old('db_username')}}"placeholder="Usuário do DB">
								@if ($errors->has('db_user'))
								<span class="help-block">
									<strong>{{ $errors->first('db_user') }}</strong>
								</span>
								@endif
							</div> 
						</div>

						<div class="form-group {{ $errors->has('db_password') ? 'has-error' : '' }}">
							<label class="col-sm-2 control-label" for="db_password">Senha:</label>
							<div class="col-sm-5">     
								<input class="form-control" type="password" name="db_password"  value="{{old('db_password')}}"placeholder="Senha do DB">
								@if ($errors->has('db_password'))
								<span class="help-block">
									<strong>{{ $errors->first('db_password') }}</strong>
								</span>
								@endif
							</div> 
						</div>

							<!--div class="form-group {{ $errors->has('usuario') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label" for="db_password">Usuário:</label>
								<div class="col-sm-5">     
									<input class="form-control" type="email" name="usuario"  value="{{old('usuario')}}"placeholder="email do usuário">
								</div> 
							</div-->

							<div class="form-group {{ $errors->has('usuario') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label" for="usuario">Usuário:</label>
								<div class="col-sm-5">    
									<select class="form-control" name="usuario">
										<option value="" disabled selected>Informe o Usuário...</option>
										@foreach($usuarios as $usuario)
										<option value="{{$usuario->email}}"
											>{{$usuario->email}}
										</option>
										@endforeach
									</select>
									@if ($errors->has('usuario'))
									<span class="help-block">
										<strong>{{ $errors->first('usuario') }}</strong>
									</span>
									@endif
								</div> 
							</div>

							<!--div class="form-group {{ $errors->has('validade') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label" for="db_hostname">Validade:</label>
								<div class="col-sm-5">     
									<input class="form-control" type="date" name="validade"  value="{{old('validade')}}"placeholder="Validade da aplicação">
								</div> 
							</div-->

							<!--div class="form-group">
								<div class="col-lg-offset-2 col-lg-3">
									<div class="checkbox">
										<label class="checkbox-inline">
											<input type="checkbox" name="criadb" value="" >CRIAR DATABASE (DB_Name)?
										</label>
									</div>
								</div>
							</div-->

							<div class="row">
								<div class="col-md-12">
									<div class="panel-footer">  
										<button type="submit" class="btn btn-default btn-sm">                  
											<i class="fa fa-save" style="color:green;"></i> Salvar
										</button>
										<a class="btn btn-default btn-sm" href="{{ route('emp_user.create')}}">
											<i class="fa fa-eraser"style="color:red;"></i> Limpar</a>
											
											<a class="btn btn-default btn-sm" href="{{ route('emp_user.index')}}">
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