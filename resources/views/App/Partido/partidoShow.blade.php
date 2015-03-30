@extends('app')

@section('head')

<title>Partido {!!$partido->id!!}</title>
@stop

@section('content')
    <div class="alert alert-success">
    	<p>Acá podés ver toda la información del partido.</p>
    	<p>Confirmar tu asistencia y ver la de tus amigos</p>
	</div>


	<p>	El partido se juega en: {!!$partido->sede->nombre!!} </p>

	<p>	Los invitados son: {!!$partido->jugadores!!} </p>

	<p>	Los Confirmados son: {!!$partido->confirmados!!} 

	</p>
@stop