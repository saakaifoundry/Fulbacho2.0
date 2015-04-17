@extends('app')

@section('head')
<title> Fulbacho - Configuración</title>
@stop


@section('content')

<h3>{!!Auth::user()->name!!}, acá podes realizar todas las configuraciones del sistema :)</h3>


{!!Form::open(array("method"=>"POST","action"=>"ConfiguracionController@store","role"=> "form", 'class'=>'form-horizontal','files'=> true))!!}
	    
    <div class="form-group">
        {!! Form::label('image', 'Your Image',array('class'=>'col-md-4 control-label'))  !!}
        <div class="col-md-6">
        	{!! Form::file('image') !!}
        </div>
    </div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!!Form::submit('Guardar', ['class'=>'btn btn-primary form-control'])!!}
		</div>
	</div>

{!!Form::close()!!}
@stop
