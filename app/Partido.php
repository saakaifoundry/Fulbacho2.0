<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'partidos';


	protected $fillable = array('precio', 'cantJugadores', 'confirmado');


	public function users() {
        return $this->belongsToMany('App\User');
    }
    
    //public function opciones() {
     //   return $this->belongsToMany('Opcion', 'partidos_opciones',
     //                               'partido_id', 'opcion_id');
   // }
    
    //public function canchas() {
     //   return $this->belongsToMany('Cancha', 'partidos_canchas',
       //                             'partido_id', 'cancha_id');
   // }

}
