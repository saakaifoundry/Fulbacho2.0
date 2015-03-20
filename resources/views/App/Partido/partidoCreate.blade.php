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
						<!--Incluyo el formulario de creación-->
						@include('App/Partido/partidoForm')
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