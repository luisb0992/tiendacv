<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';

    protected $fillable = ['status', 'customid'];

    //--------relaciones
    public function productosCarritos(){
        return $this->hasMany('App\ProductoCarrito');
    }

   public function productos(){
      return $this->belongsToMany('App\Producto','productos_carritos');
   }

   public function orden(){
      return $this->hasOne('App\Orden')->first();
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
       return $this->productos()->sum("precio_dolar");
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
   		if (Carrito::find($carrito_id)) {
          return Carrito::find($carrito_id);
      }else{
          return Carrito::createWithoutSession();
      }
   }

   //metodo para crear el carrito de compras
   public static function createWithoutSession(){

      $carrito = new Carrito();
      $carrito->status = "Incompleto";
      $carrito->save();

      return $carrito;
   		// return Carrito::create([
   		// 		"status" => "Incompleto"
   		// 	]);
   }

   public function generateCustomId(){
      return md5("$this->id $this->updated_at");
   }

   public function updateCustomId(){
      $this->status = "aprovado";
      $this->customid = $this->generateCustomId();
       return $this->save();
   }

   public function aprovado(){
      return $this->updateCustomId();
   }
}
