<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Illuminate\Http\Request;

use App\Partido;
use App\Cancha;

class PartidoController extends Controller {

	protected $redirectTo = '/app';

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
	public function store(Request $request)
	{
		$partido = Partido::create($request->all());
		$partido->jugadores()->attach(Auth::user()->id); //completa la tabla user_partido
		$partido->sede()->associate(Cancha::where('nombre',$request->input('cancha'))->first()); //completa sede_id
		$partido->save();
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
		//
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

}
