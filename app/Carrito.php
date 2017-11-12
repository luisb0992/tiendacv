<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';

    protected $fillable = ['status'];

    //--------relaciones
    public function productosCarritos(){
        return $this->hasMany('App\ProductoCarrito');
    }
   public function productos(){
      return $this->belongsToMany('App\Producto','productos_carritos');
   }

   //metodo para contar la cantidad de carritos de comprA
	 public function productoSize(){
		  return $this->productos()->count();
	 }

	  //metodo para sumar los precios del carrito, el total de todos en bolivares
    public function totalBSF(){
       return $this->productos()->sum("precio_bolivar");
    }

    //metodo para sumar los precios del carrito, el total de todos en dolares
    // se coloca / 100 solo para efectos de prueba via paypal
    public function totalUSD(){
       return $this->productos()->sum("precio_dolar") / 100;
    }

    //--metodo integrador de funcion que permite
    //crear una nueva session para el carrito o
    //para mantener y saber el id de lasession del
    //carrito de compras mediante findbysession
    public static function findOrCreateBySessionID($carrito_id){
   		if ($carrito_id) {
   			return Carrito::findBySession($carrito_id);
   		}else{
   			return Carrito::createWithoutSession();
   		}
   }

   //metodo para buxcar el carrito si hay un id
   public static function findBySession($carrito_id){
   		return Carrito::find($carrito_id);
   }

   //metodo para crear el carrito de compras
   public static function createWithoutSession(){
   		return Carrito::create([
   				"status" => "Incompleto"
   			]);
   }
}
