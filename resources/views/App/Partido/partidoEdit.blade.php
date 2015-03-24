@extends('app')

@section('head')
	<title> Fulbacho - Editar Partidos</title>
@stop


@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Editar</div>
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
					<!--{!!$partido->cancha->nombre!!} -->

					{!!Form::model($partido,["method" => "PATCH","action" => ["PartidoController@update", $partido->id], 'class'=>'form-horizontal'])!!}
						<!--Incluyo el formulario de edicion -->
						@include('App/Partido/partidoForm', ['submitButtom' => 'Editar'])
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
</div>



@stop

<!--Se incluyen las canchas -->
@include('App/Partido/PartidoScript')