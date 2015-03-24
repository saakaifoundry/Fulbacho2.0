<?php namespace App\Http\Controllers;

use App\Http\Requests\PartidoRequest;
use App\Http\Controllers\Controller;
use Auth;

use App\Partido;
use App\Cancha;
use App\User;

class PartidoController extends Controller {

	protected $redirectTo = '/app';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//		dd(Auth::user()->contactos()->get()->toArray());
//		dd(Auth::user()->contactos()->where('id',2)->get()->toArray());
		$partidos = Auth::user()->partidos()->get();//trae los partidos del user logueado
		return view ('App.Partido.partido')->with('partidos', $partidos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view ('App.Partido.partidoCreate');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PartidoRequest $request)
	{
		$partido = Partido::create($request->all());
		$this->saveContactos($partido, $request->contactos); //completa la tabla user_partido
		$this->saveSede($partido, $request->cancha); //completa sede_id
		return redirect('partidos'); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$partido = Partido::findOrFail($id);
		return view ('App.Partido.partidoShow')->with('partido',$partido);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$partido = Partido::findOrFail($id);
		return view ('App.Partido.partidoEdit',compact('partido'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PartidoRequest $request)
	{
		$partido = Partido::findOrFail($id);
		$partido->update($request->all());
		$this->saveSede($partido, $request->cancha);//completa sede_id
		return redirect('partidos');
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


	//TODO: buscar otra forma de hacer esto.
	private function saveSede($partido,$cancha){
			$partido->sede()->associate(Cancha::where('nombre',$cancha)->first()); //completa sede_id
			$partido->save();
	}

	/*
	*Se completa la relación partido_user
	*/
	private function saveContactos($partido, $contactosRequest){
		$contactos = [];
		$userLogueado = Auth::user();
		
		$contactos[]=$userLogueado->id; //se agrega al usuario que crea el partido
		
		//Se agregan a los contactos invitados
		foreach ($contactosRequest as $unContacto) {
			$contacto = $userLogueado->contactos()->where('name',$unContacto)->get()->first();
			if($contacto != null){
				$contactos[] = $contacto->id;
			}
		}

		$partido->jugadores()->attach($contactos); //guarda en la tabla partido_user
	}
}
