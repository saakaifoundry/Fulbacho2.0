@extends('app')

@section('head')
<title> Fulbacho - Nuevo Partidos</title>



@stop


@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo</div>
				<div class="panel-body">
					<!--Se incluyen los errores-->
					@include('errors.errorShow')	
					{!!Form::open(array("method" => "POST","action" => "PartidoController@store","role" => "form", 'class'=>'form-horizontal'))!!}
						<!--Incluyo el formulario de creación-->
						@include('App/Partido/partidoForm', ['submitButtom' => 'Crear'])
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
</div>



@stop

<!--Se incluyen las canchas -->
@include('App/Partido/canchasScript')