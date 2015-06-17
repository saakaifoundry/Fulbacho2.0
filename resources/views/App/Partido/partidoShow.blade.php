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
   <div class="funkyradio">
        <div class="funkyradio-success">
            <input type="radio" name="radio" id="radio3" />
            <label for="radio3">Asistir</label>
        </div>

        <div class="funkyradio-danger">
            <input type="radio" name="radio" id="radio4" />
            <label for="radio4">No asistir</label>
        </div>			
    </div>
    <div class="form-group">
    {!!Form::open(array("method" => "POST","action" => "PartidoController@saveConfirmar","role" => "form", 'class'=>'form-horizontal'))!!}
        <div class="col-md-6 col-md-offset-2">
            {!!Form::submit('Guardar', ['class'=>'btn btn-primary form-control'])!!}
        </div>
    {!!Form::close()!!}
</div>

	<p>	El partido se juega en: {!!$partido->sede->nombre!!} </p>

	<div>	Los invitados son: 
    <ul class="list-group">
    	@foreach ($partido->jugadores as $jugador)
		        <li class="list-group-item"><span class="badge glyphicon glyphicon-remove-circle"> </span> {!!$jugador->name !!}</li>
		@endforeach
    </ul>

	<p>{!!$partido->confirmados()->count()!!} confirmados</p>
	<p>{!!$partido->jugadores()->count() - $partido->confirmados()->count()!!} no confirmados</p>


@stop