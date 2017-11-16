<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = "calificaciones";

    protected $fillable = [
    	"puntaje", "comentario_id"
    ];

    public function comentario(){
    	return $this->belongsTo("App\Comentario", "comentario_id");
    }
}
