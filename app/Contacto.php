<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Contacto extends Model {

	//

	public function users(){
    	return $this->belongsToMany('App\User');
    }
}
