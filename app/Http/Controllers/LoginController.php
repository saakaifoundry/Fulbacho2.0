<?php namespace App\Http\Controllers;

//use App\Http\Request;
use Auth;
use Request;
/**
 * Description of LoginController
 *Controller para iniciar sesion
 * @author federico
 */
class LoginController extends Controller {
    //put your code here
    public function __construct(){
        // Perform CSRF check on post
        $this->beforeFilter('csrf', array('on' => array('post')));
    }
    
    public function index(){
        return view('LoginView.loginExtend');
    }
    
    public function store(){

        $input = Request::all(); //trae todos los input del form

        $remember =  Request::get('remember');
        
        if($remember == 'On'){
            $remember=TRUE;
        }
        else{
            $remember = FALSE;
        }
        
        if(Auth::attempt(['email'=>$input['email'],'password'=>$input['password']] )){
            return redirect("/");
        }
        else {
            $message = "<hr><label class='label label-success'> Los datos no son correctos, intente nuevamente</label><hr>";
            //TODO: faltan los errores 
             return redirect('login')
          //   ->withErrors($validator) // send back all errors to the login form
             ->withInput($request->except('password')) // send back the input (not the password) so that we can repopulate the form
             ->with("message", $message); //aviso que los datos son incorrectos
            }
    }
}
