@extends('app')

@section('head')
<title> Fulbacho</title>
@stop

@section('content')

<h1>Bienvenido {!! Auth::user()->name!!}</h1>

<h2>Mis partidos</h2>
@stop