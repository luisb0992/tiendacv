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

    public function calificacion(){
    	return $this->hasOne("App\Calificacion", "comentario_id");	
    }

    // contar comentarios de cada producto
    public static function countComentarios($id){
    	return Comentario::where("producto_id", $id)->count();
    }

    // total comentarios 
    public static function allComentarios($id){
    	$count = Comentario::where("producto_id", $id)->count();
    	if ($count == 1) {
    		return Comentario::where("producto_id", $id)->first();
    	}else{
    		return Comentario::where("producto_id", $id)->get();
    	}
    }
}
