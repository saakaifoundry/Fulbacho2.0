<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cancha;
use Illuminate\Support\Str;

class getCancha extends Controller {

//TODO: mejorar para que devuelva id/valor.  https://www.youtube.com/watch?v=pLBtduvx5b0
//Así cuando se crea el partido se tiene el id y no hay que ir a buscarlo.
	public function getCancha(Request $request){

		$cancha = $request->input('term');
		$canchas = Cancha::all();
		$results = [];
		foreach ($canchas as $sede) {
			if(strpos((Str::lower($sede['nombre'])),(Str::lower($cancha))) !== false){
				$results[] = $sede['nombre'];
			}
		}
		return $results;
	}
}
