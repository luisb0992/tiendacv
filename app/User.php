<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','ape', 'email', 'password','status','perfil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //relaciones
    public function tienda(){
        return $this->hasOne('App\Tienda');
    }

    public function productos(){
        return $this->hasMany('App\Producto');
    }

    public function preguntas(){
        return $this->hasMany('App\Pregunta');
    }

    public function comentarios(){
        return $this->hasMany('App\Comentario');
    }

}
