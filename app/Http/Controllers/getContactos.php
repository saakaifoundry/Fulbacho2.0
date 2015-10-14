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

	public function getContactos(Request $request){

		$contactos = Auth::user()->contactos()->get()->toArray();	
		$results = [];
		foreach ($contactos as $unContacto) {
			
			if(strpos((Str::lower($unContacto['name'])),(Str::lower($request->input('term')))) !== false){
				$results[] = ['value'=>$unContacto['name'], 'id'=>$unContacto['id']];
			}
		}
		return $results;
	}
}
