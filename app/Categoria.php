<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    // ------------- Relaciones
    public function productos(){
    	return $this->hasMany('App\Producto');
    }
}
