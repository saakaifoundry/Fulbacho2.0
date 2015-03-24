<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model {

	//

	public function users(){
    	return $this->belongsToMany('App\User');
    }
}
