<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = "preguntas";

    protected $fillable = [
    	"producto_id", "user_id", "pregunta", "respuesta"
    ];

    // definiendo relaciones
    public function producto(){
    	return $this->belongsTo("App\Producto", "producto_id");
    }

    public function user(){
        return $this->belongsTo("App\User", "user_id");
    }

    public function formato_created(){
    	$created = $this->created_at;
        $newcreated = date('d-m-Y',strtotime(str_replace('/', '-', $created)));
        return $newcreated;
    }
}
