<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password','image'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function partidos() {
       // return $this->belongsToMany('App\Partido')->orderBy('created_at','desc'); //por si se los quiere ordenados
        return $this->belongsToMany('App\Partido');
    }

    public function contactos(){
    	return $this->belongsToMany('App\User', 'contacto_user', 'user_id','contacto_id');
    }

    public function getContactos(){
    	return $this->hasManyThrough('App\Contacto', 'App\User', 'contacto_id','user_id');
    }

}
