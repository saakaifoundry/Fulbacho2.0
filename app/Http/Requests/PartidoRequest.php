<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PartidoRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true; //quien puede crear/editar un partido. Por ahora todos.
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//Validaciones
		];
	}

}
