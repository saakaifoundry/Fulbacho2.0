<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cancha;
use Illuminate\Support\Str;

class getCancha extends Controller {

	public function __construct(){
        $this->middleware('auth');
    }

	public function getCancha(Request $request){

		$cancha = $request->input('term');
		$canchas = Cancha::all();
		$results = [];
		foreach ($canchas as $sede) {
			if(strpos((Str::lower($sede['nombre'])),(Str::lower($cancha))) !== false){
				$results[] = ['value'=>$sede['nombre'], 'id'=>$sede['id']];
			}
		}
		return $results;
	}
}
