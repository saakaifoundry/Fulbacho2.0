@extends('app')

@section('head')
<title> Fulbacho</title>
@stop

@section('content')

<h1>Bienvenido {!! Auth::user()->name!!}</h1>

<h2> <a href="/partidos">Partidos</a></h2>
<h2> <a href="/contactos">Contactos</a></h2>
@stop