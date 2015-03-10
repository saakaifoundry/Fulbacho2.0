@extends('layouts.bootstrap')

@section('head')
<title> Registro de usuarios</title>
@stop

@section('content')
<h1>Registro</h1>

{!!Session::get("ErrorRegister")!!}

{!! Form::open(
		array(
		'action' => 'Auth\AuthController@postRegister',
		'method' => 'POST',
		'role' => 'form',
		/*'files'=> 'true'*/
		)); 
!!}

<div class= "form-group">
{!!Form::label('Nombre')!!}
{!!Form::input('text', 'user', Input::old('user'), array('class'=> 'form-control'))!!}
<div class="bg-danger">{!!$errors->first('user')!!} </div>
</div>

<div class= "form-group">
{!!Form::label('Mail')!!}
{!!Form::input('text', 'email', Input::old('email'), array('class'=> 'form-control'))!!}
<div class="bg-danger">{!!$errors->first('email')!!} </div>
</div>

<div class= "form-group">
{!!Form::label('Contraseña')!!}
{!!Form::input('password', 'password',null, array('class'=> 'form-control'))!!}
<div class="bg-danger">{!!$errors->first('password')!!} </div>
</div>

<div class= "form-group">
{!!Form::label('Repetir')!!}
{!!Form::input('password', 'rep_password', null, array('class'=> 'form-control'))!!}
<div class="bg-danger">{!!$errors->first('rep_password')!!} </div>
</div>
{!!Form::input('hidden','registro')!!}
{!!Form::input('hidden','_token',csrf_token())!!}
{!!Form::input('submit', 'enviar', 'Enviar', null, array('class'=> 'btn btn-primary'))!!}

{!!Form::close()!!}
@stop