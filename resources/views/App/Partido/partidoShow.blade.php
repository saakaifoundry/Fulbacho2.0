@extends('app')

@section('head')
<title>Partido {!!$partido->id!!}</title>
<style type="text/css">
 .funkyradio div {
    clear: both;
    /*margin: 0 50px;*/
    overflow: hidden;
}
.funkyradio label {
    /*min-width: 400px;*/
    width: 100%;
    border-radius: 3px;
    border: 1px solid #D1D3D4;
    font-weight: normal;
}
.funkyradio input[type="radio"]:empty, .funkyradio input[type="checkbox"]:empty {
    display: none;
}
.funkyradio input[type="radio"]:empty ~ label, .funkyradio input[type="checkbox"]:empty ~ label {
    position: relative;
    line-height: 2.5em;
    text-indent: 3.25em;
    margin-top: 2em;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.funkyradio input[type="radio"]:empty ~ label:before, .funkyradio input[type="checkbox"]:empty ~ label:before {
    position: absolute;
    display: block;
    top: 0;
    bottom: 0;
    left: 0;
    content:'';
    width: 2.5em;
    background: #D1D3D4;
    border-radius: 3px 0 0 3px;
}
.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before, .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
    content:'x';
    text-indent: .9em;
    color: #C2C2C2;
}
.funkyradio input[type="radio"]:hover:not(:checked) ~ label, .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
    color: #888;
}
.funkyradio input[type="radio"]:checked ~ label:before, .funkyradio input[type="checkbox"]:checked ~ label:before {
    content:'x';
    text-indent: .9em;
    color: #333;
    background-color: #ccc;
}
.funkyradio input[type="radio"]:checked ~ label, .funkyradio input[type="checkbox"]:checked ~ label {
    color: #777;
}
.funkyradio input[type="radio"]:focus ~ label:before, .funkyradio input[type="checkbox"]:focus ~ label:before {
    box-shadow: 0 0 0 3px #999;
}
.funkyradio-default input[type="radio"]:checked ~ label:before, .funkyradio-default input[type="checkbox"]:checked ~ label:before {
    color: #333;
    background-color: #ccc;
}
.funkyradio-primary input[type="radio"]:checked ~ label:before, .funkyradio-primary input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #337ab7;
}
.funkyradio-success input[type="radio"]:checked ~ label:before, .funkyradio-success input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #5cb85c;
}
.funkyradio-danger input[type="radio"]:checked ~ label:before, .funkyradio-danger input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #d9534f;
}
.funkyradio-warning input[type="radio"]:checked ~ label:before, .funkyradio-warning input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #f0ad4e;
}
.funkyradio-info input[type="radio"]:checked ~ label:before, .funkyradio-info input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #5bc0de;
}
</style>
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