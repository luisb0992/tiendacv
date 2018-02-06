<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoCarrito extends Model
{
    protected $table = 'productos_carritos';

    protected $fillable = ['producto_id','carrito_id'];

    public function productos(){
    	return $this->belongsTo('App\Producto', 'producto_id');
    }
    
}
