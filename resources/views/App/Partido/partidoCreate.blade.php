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
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!!Form::open(array("method" => "POST","action" => "PartidoController@store","role" => "form", 'class'=>'form-horizontal'))!!}
						<!-- AUTOCOMPLETE DE CANCHAS. -->
						<div class="form-group">
							{!!Form::label('Cancha','',array('class'=>'col-md-4 control-label')) !!}
							<div class="col-md-6">
							{!!Form::input('text','cancha','',array('id'=>'canchas','class'=>'form-control'))!!}
							</div>
						</div>
						<div class="form-group">
							{!!Form::label('Fecha','',array('class'=>'col-md-4 control-label')) !!}							
							<div class="col-md-6">
							{!!Form::input('date','fecha','',array('class'=>'form-control'))!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('Horario','',array('class'=>'col-md-4 control-label')) !!}
							<div class="col-md-6">
							{!!Form::input('text','horario','',array('class'=>'form-control'))!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('Precio','',array('class'=>'col-md-4 control-label')) !!}						
							<div class="col-md-6">
							{!!Form::input('text','precio','',array('class'=>'form-control'))!!}
							</div>
						</div>

						<div class="form-group">
 							{!!Form::label('Cantidad de Jugadores','',array('class'=>'col-md-4 control-label')) !!}
							<div class="col-md-6">
							{!!Form::input('text','cantJugadores','',array('class'=>'form-control'))!!}
							</div>
						</div>
						<div class="form-group">
							{!!Form::label('Grupo','',array('class'=>'col-md-4 control-label')) !!}						
							<div class="col-md-6">
							{!!Form::input('text','grupo','',array('class'=>'form-control'))!!}
							</div>
						</div>
						<div class="form-group">
							{!!Form::label('Contacto','',array('class'=>'col-md-4 control-label')) !!}						
							<div class="col-md-6">
							{!!Form::input('text','contacto','',array('class'=>'form-control'))!!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary form-control">
									Crear
								</button>
							</div>
						</div>
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
</div>



@stop


@section('script')


	<script>
		$( "#canchas" ).autocomplete({
			source: 'http://localhost:8888/getCancha',
			minLength:1,

		});

</script>

@stop