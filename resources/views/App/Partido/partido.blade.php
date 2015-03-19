@extends('app')

@section('head')
<title> Fulbacho - Partidos</title>
@stop


@section('content')

<h3> Mis partidos <a href="{!! url('/partidos/create') !!}">+</a></h3>


	@foreach ($partidos as $partido)
		<article>
			<h3> <a href="{{ action('PartidoController@show',[$partido->id]) }}">{{$partido->id}}</a> Precio {!!$partido->precio!!} </h3> 
			<h3> Cant jugadores {!!$partido->confirmados()->count()!!}/{!!$partido->cantJugadores!!} </h3> 
			<h3> Partido Confirmado? @if ($partido->confirmado == 1) Sí @else NO @endif </h3> 

		</article>	

	@endforeach


@stop