@extends('adminlte::page')

@section('title', 'PROSim-WEB')

@section('content_header')
    <h1>Seja Bem Vindo!</h1>
@stop

@section('content')
    <p>{{ Auth::user()->name }} você está logado(a)!</p>

@stop