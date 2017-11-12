<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = "comentarios";

    protected $fillable = ["descripcion", "user_id", "producto_id"];

    public function users(){
    	return $this->belongsTo("App\User", "user_id");
    }

    public function producto(){
    	return $this->belongsTo("App\Producto", "producto_id");	
    }
}
