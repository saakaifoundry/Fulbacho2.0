<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancha extends Model {

	//

	protected $fillable = array('nombre','direccion','telefono');

	public function partidos() {
      return $this->belongsToMany('App\Partido');
    }

    public function partido(){
    	return $this->hasMany('App\Partido');
    }
}
