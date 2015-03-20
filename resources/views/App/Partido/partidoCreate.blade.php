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
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/partidos') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<!-- AUTOCOMPLETE DE CANCHAS. -->
					<div class="form-group">
							<label class="col-md-4 control-label" for="cancha">Cancha</label>
							<div class="col-md-6">
								<input type='text' id="canchas" class="form-control" name="cancha">
							</div>
					</div>
					<div class="form-group">
							<label class="col-md-4 control-label">Fecha</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="fecha" value="{{ old('fecha') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Horario</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="horario" value="{{ old('horario') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Precio</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="precio" value="{{ old('precio') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Cantidad de jugadores</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="cantJugadores" value="{{ old('cantJugadores') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Grupo</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="grupo" value="{{old('grupo')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Contacto</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="jugadores" value="{{old('jugadores')}}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary form-control">
									Crear
								</button>
							</div>
						</div>
					</form>
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