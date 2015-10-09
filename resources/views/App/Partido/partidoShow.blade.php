@extends('app')

@section('head')
<title>Partido {!!$partido->id!!}</title>
<link href="{{ asset('/css/checkbox.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="alert alert-info">
    	<p>Acá podés ver toda la información del partido.</p>
    	<p>Confirmar tu asistencia y ver la de tus amigos</p>
	</div>
    {!!Form::open(array('url'=>'partidos/confirmar','method'=>'POST'))!!}
    <input type="hidden" id="partido" value={!!$partido->id!!} />
       <div class="funkyradio">
            <div class="funkyradio-success">
                <input type="radio" name="radio" id="asistirCheck"/>
                <label for="radio3">Asistir</label>
            </div>

            <div class="funkyradio-danger">
                <input type="radio" name="radio" id="noAsistirCheck"/>
                <label for="radio4">No asistir</label>
            </div>			
        </div>
    {!!Form::close() !!}
    <div class="form-group">

	<p>	El partido se juega en: {!!$partido->sede->nombre!!} </p>

    <div class="alert alert-success">Confirmados: 
    <ul class="list-group" id='confirmados'>
        @foreach ($partido->confirmados as $jugador)
                <li class="list-group-item" id="jugadorSi_{!!$jugador->id !!}"> {!!$jugador->name !!}</li>
        @endforeach
    </ul>
    </div>
    <div class="alert alert-danger"> No confirmados: 
    <ul class="list-group" id='noConfirmados'>
        @foreach ($partido->noConfirmados as $jugador)
                <li class="list-group-item" id="jugadorNo_{!!$jugador->id !!}"> {!!$jugador->name !!}</li>
        @endforeach
    </ul>
    </div>

	<p><span id='cantConfirmados'>{!!$partido->confirmados()->count()!!}</span> confirmados</p>
	<p><span  id='cantNoConfirmados'>{!!$partido->noConfirmados()->count()!!} </span> no confirmados</p>


@stop


@include('App/Partido/PartidoShowScript')