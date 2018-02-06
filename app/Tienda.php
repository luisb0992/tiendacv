<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = 'tiendas';

    protected $fillable = [
    	'titulo','sub_titulo','letra','RIF',
    	'correo', 'telefono_1', 'telefono_2',
    	'user_id','created_at','updated_at'
    ];

    //definiendo relaciones
    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

    // conversion del formato de creacion y actualizacion del registro
    public function forcreated(){
        $created = $this->created_at;
        $newcreated = date('d-m-Y',strtotime(str_replace('/', '-', $created)));
        return $newcreated;
    }

    public function forupdated(){
        $updated = $this->updated_at;
        $newupdated = date('d-m-Y',strtotime(str_replace('/', '-', $updated)));
        return $newupdated;
    }
  // fin de la conversion 
    
    public function sub_titulo(){
        if ($this->sub_titulo == '') {
            $subtitulo = 'Sin Subtitulo';
        }else{
            $subtitulo = $this->sub_titulo;
        }
        return $subtitulo;
    }

    public static function total_tiendas(){
        return Tienda::where('user_id','=', \Auth::user()->id)->count();
    }
}