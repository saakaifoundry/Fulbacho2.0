

<div class="navbar-collapse collapse">
{!!Form::open(array(
            "method" => "POST",
            "action" => "Auth\AuthController@postLogin",
            "role" => "form",
            "class"=>"navbar-form navbar-right"
            ))!!}
 
            <div class="form-group">
                {!!Form::input("text", "email","", array("class" => "form-control"))!!}
            </div> 
            
            <div class="form-group">    
                {!!Form::input("password", "password","", array("class" => "form-control"))!!}
            </div>
            <div class="form-group">
                {!!Form::input("hidden", "_token", csrf_token())!!}
                {!!Form::input("submit", null, "Iniciar sesión", array("class" => "btn btn-success"))!!}
            </div>
            <div style="color: white">
                {!!Form::label("Recordar sesión:")!!}
                {!!Form::input("checkbox", "remember", "On", array("class" => "form-control"))!!}
            </div>

{!!Form::close()!!}

</div>