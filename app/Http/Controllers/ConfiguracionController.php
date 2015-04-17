<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
class ConfiguracionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('App.Configuracion.configuracionIndex');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{	
		dd($this->guardarImagen($request->file('image')));
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

	private function guardarImagen($file){
	
		$destinationPath = public_path('images'); // lugar donde se guarda la imagen: public/images
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = Auth::user()->name. rand(11111,99999).'.'.$extension; // se renombra con un nombre aleatorio
  		$file->move($destinationPath,$fileName); //se traslada al lugar elegido
  		
  		return $destinationPath.'/'.$fileName;
	}

}
