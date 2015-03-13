<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css" >
	<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap-theme.css" >
	<script type="text/javascript" src="/bootstrap/js/jquery.js"></script>
  <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
	
 	@yield('head') <!-- bloque de incluye al head. Principalmente el título	-->

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{URL::to('')}}">Project Login</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
        
          	<?php
          	$vista_actual = Request::path();
          	$rutas = array('/' =>'' , 'contacto.index'=>'', 'auth/register'=>'',);
          	
          	foreach (array_keys($rutas) as $ruta){
          		if($vista_actual == $ruta){
          			$rutas[$vista_actual] = 'active';
          			break;
          		}
          	}
          	?>
          
            <li class="{{$rutas['/']}}"><a href="{{URL::to('')}}">Home</a></li>
            <?php  if(Auth::guest()){ ?>
            <li class="{{$rutas['auth/register']}}"><a href="{{url('/auth/register')}}">Registro</a></li> 
            <?php } ?>
            <li class="{{$rutas['contacto.index']}}"><a href="{{URL::to('contacto')}}">Contact</a></li>
            <?php if(Auth::guest()){ ?>
          </ul>
                <?php if(!(Request::path()=='auth/login')){ ?>
                    <!--Incluimos el form de login-->
                    @include('LoginView.login')
                <?php }?>
            <?php } else{ ?>
            <!--Muestra botón salir si está logueado-->
                <li>
                    <div class="navbar-collapse collapse"> 
                      <form class="navbar-form" role="form" method="GET" action="{{ url('/auth/logout') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-succes">Salir</button>
                      </form>
                    </div>
                </li>
        </ul>
            <?php } ?>
        </div><!--/.nav-collapse -->
            
      </div>
    </div>

    <div class="container" style="margin-top: 100px">

 	@yield('content') <!-- bloque de incluye al head	-->

    </div><!-- /.container -->

  </body>
</html>


 
