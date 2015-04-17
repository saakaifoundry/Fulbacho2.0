@extends('app')

@section('head')

<title>Partido {!!$partido->id!!}</title>
@stop

@section('content')
    <div class="alert alert-info">
    	<p>Acá podés ver toda la información del partido.</p>
    	<p>Confirmar tu asistencia y ver la de tus amigos</p>
	</div>


	<p>	El partido se juega en: {!!$partido->sede->nombre!!} </p>

	<div>	Los invitados son: 
    <ul class="list-group">
    	@foreach ($partido->jugadores as $jugador)
	        @if($jugador->id%2==0)
		        <li class="list-group-item list-group-item-success"><span class="badge glyphicon glyphicon-remove-circle"> </span> {!!$jugador->name !!}</li>
    		@else
		        <li class="list-group-item list-group-item-warning"><span class="badge glyphicon glyphicon-ok-circle"></span>  {!!$jugador->name !!}</li>
    		@endif
		@endforeach
    </ul>

	<p>{!!$partido->confirmados()->count()!!} confirmados</p>
	<p>{!!$partido->jugadores()->count() - $partido->confirmados()->count()!!} no confirmados</p>
@stop