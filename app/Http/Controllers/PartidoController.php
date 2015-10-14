<?php namespace App\Http\Controllers;

use App\Http\Requests\PartidoRequest;
use App\Http\Controllers\Controller;
use Auth;

use App\Partido;
use App\Cancha;
use App\User;
use Request;
use Input;

class PartidoController extends Controller {

	protected $redirectTo = '/app';

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
		$this->saveContactos($partido, $request->contactoId); //completa la tabla user_partido.
		$this->saveSede($partido, $request->canchaId); //completa sede_id
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

	public function saveConfirmar(PartidoRequest $request){
		if(Request::ajax()) {

			$respuesta = $request->input('respuesta');
			$requestPartido = $request->input('partidoId');
			$partido = Partido::findOrFail($requestPartido);
			$confirmado = ['confirmado' => '0'];

			if($respuesta == 'si'){
				$confirmado['confirmado']='1'; 
			}
			//Actualizo el partido_user con confirmado 1 ó 0
			$user = Auth::user();-
			$user->partidos()->updateExistingPivot($partido->id, $confirmado);

			$cantConfirmados = $partido->confirmados()->count();
			$cantNoConfirmados = $partido->noConfirmados()->count(); 

			$return = ['confirmados'=>$cantConfirmados, 'noConfirmados'=>$cantNoConfirmados, 'user'=>$user->id];

      		return response()->json($return);
    	}
	}
	
	private function saveSede($partido,$cancha){
			$partido->sede()->associate(Cancha::where('id',$cancha)->first()); //completa sede_id
			$partido->save();
	}

	/*
	*Se completa la relación partido_user
	*/
	private function saveContactos($partido, $contactosRequest){
		$contactos = [];
		$userLogueado = Auth::user();
		
		$contactos[]=$userLogueado->id; //se agrega al usuario que crea el partido
		$contactosUnique = array_unique($contactosRequest); //se sacan los repetidos
		//Se agregan a los contactos invitados
		foreach ($contactosUnique as $unContactoId) {
			$contacto = $userLogueado->contactos()->where('id',$unContactoId)->get()->first();
			if($contacto != null){
				$contactos[] = $contacto->id;
			}
		}

		$partido->jugadores()->attach($contactos); //guarda en la tabla partido_user
	}
}
