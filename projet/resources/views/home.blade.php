@extends('adminlte::page')

@section('title', 'ProSIM-Web')

@section('content_header')
    <h1>Seja Bem Vindo!</h1>
@stop

@section('content')
    <p>{{ Auth::user()->name }} você está logado(a)!</p>

<!--h1> Conectado ao Database =>{{ DB::connection()->getDatabaseName() }}</h1-->


<h1> Conectado ao Database: => {{ session('nomeempresa')['db_database'] ?? 'Não encontrou nome da Empresa'}}</h1>







@stop