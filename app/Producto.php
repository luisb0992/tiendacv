<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
    	'user_id','titulo','categoria_id','descripcion',
    	'precio_bolivar','precio_dolar','extension'
    ];

    //---------- Relaciones
    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

    public function productosCarritos(){
        return $this->hasMany('App\ProductoCarrito');
    }

    public function carritos(){
        return $this->belongsToMany('App\Carrito','productos_carritos');
    }

    public function categoria(){
    	return $this->belongsTo('App\Categoria','categoria_id');		
    }

    public function comentarios(){
        return $this->hasMany('App\Comentario');
    }

    public function calificaicones(){
        return $this->hasMany('App\Calificaion');
    }
    //------------- fin de las relaciones
    
    // metodos personalizados
    public function preguntas($producto_id){
        return Pregunta::where("producto_id", $producto_id)->where("respuesta", null)->count();
    }

    public function scopeLatest($query){
		return $query->orderBy("id", "desc");
	}

    public function paypalItem(){
    	return \PaypalPayment::item()
    	->setName($this->titulo)
    	->setDescription($this->descripcion)
    	->setCurrency('USD')
    	->setQuantity(1)
    	->setPrice($this->precio_dolar / 100); 
    }

    public function nameCategoria(){
        return $this->categoria->name;
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
}
