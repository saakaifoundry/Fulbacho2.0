@extends('layouts.bootstrap')

@section('head')
<title> Login de usuarios</title>
@stop



@section('content')
<h1>Iniciar Sesión</h1>

@if (count($errors) > 0)
    <div class="error-notice">    
        @foreach ($errors->all() as $error)
            <div class="oaerror danger">
               {{ $error }}
            </div>
            @endforeach                                
    </div>
@endif


{!!Form::open(array(
            "method" => "POST",
            "action" => "Auth\AuthController@postLogin",
            "role" => "form"
            ))!!}
        
            <div class="form-group">
                {!!Form::label('Mail')!!}
                {!!Form::input("text", "email","", array("class" => "form-control"))!!}
            </div> 
            
            <div class="form-group">
                {!!Form::label('Contraseña')!!}    
                {!!Form::input("password", "password","", array("class" => "form-control"))!!}
            </div>
            <div class="form-group">
                {!!Form::label("Recordar sesión:")!!}
                {!!Form::input("checkbox", "remember", "On", array("class" => "radio-inline"))!!}
            </div>
            <div class="form-group">
                {!!Form::input("hidden", "_token", csrf_token())!!}
                {!!Form::input("submit", null, "Iniciar sesión", array("class" => "btn btn-success"))!!}
            </div>

{!!Form::close()!!}

@stop