<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Contacto;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactoController extends Controller {


    public function __construct(){
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view ('App.Contacto.contactoIndex')->with('contactos', $this->getContactos());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('App.Contacto.contactoCreate');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $requests)
	{
		$input = $requests->all(); //trae todos los input del form
        $user = Auth::user();

        try{ 
			$contacto = $user->where('email',$input['email'])->firstOrFail(); //todo: exceptions
		}
		//Si no equiste el contacto throw exceptions
    	catch (ModelNotFoundException $e){
    		return 'No existe el usuario';
    	}

        if($contacto != null and !$user->contactos()->where('contacto_id',$contacto->id)){
            $user->contactos()->attach($contacto->id);
        }

        return view ('App.Contacto.contactoIndex')->with('contactos', $this->getContactos());
    }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('App.Contacto.contactoEdit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	//devuelve los contactos
	//Todo: sacar de acá
	private function getContactos(){
		return Auth::user()->contactos()->get();
	}

}
