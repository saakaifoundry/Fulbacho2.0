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


	public function jugadores() {
      return $this->belongsToMany('App\User');
  }
    
  public function canchas() {
    return $this->belongsToMany('App\Cancha');
  }

  public function sede(){
    return $this->belongsTo('App\Cancha');
  }

  public function confirmados(){
    return $this->jugadores()->where('confirmado',1);
  }

  public function cancha(){
      return $this->sede(); //->lists('nombre');
  }
  
  //public function opciones() {
     //   return $this->belongsToMany('Opcion', 'partidos_opciones',
     //                               'partido_id', 'opcion_id');
   // }
    


}
