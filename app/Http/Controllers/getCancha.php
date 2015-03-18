<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cancha;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
class getCancha extends Controller {



	public function getCancha(Request $request){

		$cancha = $request->input('term');
		$canchas = Cancha::all();
		$result = [];

		foreach ($canchas as $sede) {
			if(strpos(Str::lower($sede),$cancha) !== false){
				$result[] = $sede;
			}
		}
		return $result[0];
	}


	
}
