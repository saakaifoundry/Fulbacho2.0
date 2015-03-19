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
				$results[] = $sede;
			}
		}
		return $results[0];

		return [
        "id"=>"1",
        "nombre"=>"Serrano",
        "direccion"=>"serrano 123",
        "telefono"=>"1234567",
        "created_at"=>"-0001-11-30 00:00:00",
        "updated_at"=>"-0001-11-30 00:00:00"
		];

	}
}
