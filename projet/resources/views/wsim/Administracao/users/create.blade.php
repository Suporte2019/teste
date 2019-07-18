<!--
 * wsim/users/create.blade
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

@section('title', 'Adicionar - Usuário')

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
					<li><a href="{{route('usuario.index')}}">Usuário</a></li>
					<li class="active">Adicionar</li>
				</ol>

				<!--div class="panel-body"-->

					<form class="form-horizontal" action="{{ route ('usuario.store')}}" method="post">
						{{ csrf_field() }}

									<!--div class="form-group">
										<label class="col-sm-2 control-label" for="id">ID:</label>
										<div class="col-sm-1">
											<input class="form-control" name="id" type="text" disabled>
										</div>
									</div-->

									<!--div class="form-group">
										<label class="col-sm-2 control-label" for="id">Código:</label>
										<div class="col-sm-1">
											<input class="form-control" name="id" type="text" >
										</div>
									</div-->

									<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
										<label class="col-sm-2 control-label" for="name">Nome:</label>
										<div class="col-sm-5">     
											<input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Nome">
											@if ($errors->has('name'))
											<span class="help-block">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
											@endif
										</div> 
									</div>

									<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
										<label class="col-sm-2 control-label" for="email">E-mail:</label>
										<div class="col-sm-5">     
											<input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="Email">
											@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
											@endif
										</div> 
									</div>

									<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
										<label class="col-sm-2 control-label" for="password">Senha:</label>
										<div class="col-sm-2">     
											<input class="form-control" type="password" name="password"  value="{{old('password')}}"placeholder="4 dígitos">
											@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
											@endif
										</div> 
										<label class="col-sm-1 control-label" for="email">Tipo:</label>
										<div class="col-sm-2">     
											<input class="form-control" type="text" name="tipo" value="{{old('tipo')}}" placeholder="(Cliente...Vendedor)">
										</div> 
										

									</div>

									<!--div class="form-group">
										<label class="col-sm-2 control-label" for="email">Tipo:</label>
										<div class="col-sm-5">     
											<input class="form-control" type="text" name="tipo" value="{{old('tipo')}}" placeholder="Tipo de usuário...(Cliente...Vendedor)">
										</div> 
									</div-->

									<div class="form-group {{ $errors->has('empresa') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label" for="empresa">Empresa:</label>
								<div class="col-sm-5">    
									<select class="form-control" name="empresa">
									 <option value="" disabled selected>Informe a Empresa...</option>
										@foreach($empresas as $empresa)
										<option value="{{$empresa->nome}}"
											>{{$empresa->nome}}
										</option>
										@endforeach
									</select>
									
								</div> 
							</div>

							<div class="form-group">
                <label class="col-sm-2 control-label" for="status">Situação:</label>
                <div class="col-sm-2">    
                  <label class="radio-inline">
                    <input type="radio" name="status" value="1" checked> <spam class="label label-success">ATIVO</spam>
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="status" value="0"> <spam class="label label-danger">INATIVO</spam>
                  </label> 
                </div> 
              </div>

									<!--div class="form-group">
										<label class="col-sm-2 control-label" >GRUPO:</label>

										@foreach($roles as $role)   

										<div class="col-sm-2">
											<input type="checkbox" name="role_id[]" class="required"
											value="{{ $role->id }}" 
											{{$role->nome == 'Usuario' ? 'checked' : ''}}>
										{{ $role->nome }}
											<br/>
										</div>

										@endforeach 

									</div-->

									<div class="form-group">
										<label class="col-sm-2 control-label" >GRUPO:</label>
									</div>
									
									<hr/>
									
										@foreach($roles as $role)   

										<div class="col-sm-2">
											<input type="checkbox" name="role_id[]" class="required"
											value="{{ $role->id }}" 
											{{$role->nome == 'Restrito' ? 'checked' : ''}}>
										{{ $role->nome }}
											<br/>
											<br/>
										</div>

										@endforeach 
							
									<br/>
					

									<div class="row">
										<div class="col-md-12">
										<div class="panel-footer"> 
											<button type="submit" class="btn btn-default btn-sm">                    
												<i class="fa fa-save" style="color:green"></i> Salvar
											</button>
										
											<a class="btn btn-default btn-sm" href="{{ route('usuario.create')}}">
												<i class="fa fa-eraser"style="color:red;"></i> Limpar</a>
											
											<a class="btn btn-default btn-sm" href="{{ route('usuario.index')}}">
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