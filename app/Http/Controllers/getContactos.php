<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class getContactos extends Controller {

	public function __construct(){
        $this->middleware('auth');
    }

//TODO: mejorar para que devuelva id/valor.  https://www.youtube.com/watch?v=pLBtduvx5b0
//Así cuando se crea el partido se tiene el id y no hay que ir a buscarlo.
	public function getContactos(Request $request){

		$contactoBusqueda = $request->input('term');
		$userLogueado = Auth::user();
		$contactos = $userLogueado->contactos()->get()->toArray();	
		$results = [];
		foreach ($contactos as $unContacto) {
			if(strpos((Str::lower($unContacto['name'])),(Str::lower($contactoBusqueda))) !== false){
				$results[] = $unContacto['name'];
			}
		}
		return $results;
	}
}
